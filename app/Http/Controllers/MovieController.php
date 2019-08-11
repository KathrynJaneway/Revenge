<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\Constraint\IsJson;

class MovieController extends Controller {

    private $errorArray = [];

    public function search(){
        $movie_title = str_replace(' ', '_', $_POST['movie_title']);

        $movie = DB::table('movie')->where('Title', 'LIKE', '%'.$_POST['movie_title'].'%')->get();

        if (count($movie) === 0) {
            $movie = $this->requestToOMDb($movie_title);
        } else {
            $movie = (array)$movie[0];
        }

        //If no data OMDb send N/A, for the DB we need null
        foreach ($movie as $key => $value) {
            if (is_null($value)) {
                $movie[$key] = 'No data available!';
            }
        }

        return response()->json(json_encode($movie));
    }

    /**
     * @param $movie_title
     *
     * @return array|mixed
     */
    public function requestToOMDb($movie_title)
    {
        //Initial curl
        $ch = curl_init();

        //Set the URL with search title and secret apikey
        curl_setopt($ch, CURLOPT_URL, "http://www.omdbapi.com/?t=" . $movie_title . "&apikey=922e836");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Execut the request
        $responseOMDb = curl_exec($ch);

        //HTTP-Statuscode from response
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //Closed the curl
        curl_close($ch);

        if ($http_code === 200) {

            //Json decode the response to an array
            $responseArray = json_decode(utf8_encode($responseOMDb), true);

            //Data prepared for DB
            unset($responseArray['Response']);
            $today                       = date('Y-m-d');
            $responseArray["Year"]       = (int)$responseArray["Year"];
            $responseArray['imdbVotes']  = (double)(str_replace(',', '.', $responseArray['imdbVotes']));
            $responseArray['created_at'] = $today;
            $responseArray['Ratings']    = json_encode($responseArray['Ratings']);
            $responseArray['Metascore']  = (int)$responseArray['Metascore'];

            //If no data OMDb send N/A, for the DB we need null
            foreach ($responseArray as $key => $value) {
                if ($value === 'N/A') {
                    $responseArray[$key] = null;
                }
            }

            //Insert in DB
            //DB::table('movie')->insert(['Title' => 'Toy Story', 'Year' => 1995, "Rated" => "G","Released" => "22 Nov 1995","Runtime" => "81 min","Genre" => "Animation, Adventure, Comedy, Family, Fantasy","Director" => "John Lasseter","Writer" => "John Lasseter (original story by), Pete Docter (original story by), Andrew Stanton (original story by), Joe Ranft (original story by), Joss Whedon (screenplay by), Andrew Stanton (screenplay by), Joel Cohen (screenplay by), Alec Sokolow (screenplay by)","Actors" => "Tom Hanks, Tim Allen, Don Rickles, Jim Varney","Plot" => "A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.","Language" => "English","Country" => "USA","Awards" => "Nominated for 3 Oscars. Another 23 wins & 17 nominations.","Poster" => "https://m.media-amazon.com/images/M/MV5BMDU2ZWJlMjktMTRhMy00ZTA5LWEzNDgtYmNmZTEwZTViZWJkXkEyXkFqcGdeQXVyNDQ2OTk4MzI@._V1_SX300.jpg","Ratings" => "[{Source:Internet Movie Database,Value:8.3/10},{Source:Rotten Tomatoes,Value:100%},{Source:Metacritic,Value:95/100}]","Metascore" => "95","imdbRating" => "8.3","imdbVotes"=>805.018 ,"imdbID" => "tt0114709","Type" =>"movie","DVD"=>"20 Mar 2001","BoxOffice" => "N/A","Production" => "Buena Vista","Website"=>"http://www.disney.com/ToyStory", "created_at" => $today]);
            DB::table('movie')->insert($responseArray);

            switch(json_last_error()) {
                case JSON_ERROR_NONE:
                    return $responseArray;
                    break;
                case JSON_ERROR_DEPTH:
                    $this->errorResponse('500', 'MovieController', 'JSON_ERROR_DEPTH', 'Maximum stack depth exceeded.');
                    break;
                case JSON_ERROR_STATE_MISMATCH:
                    $this->errorResponse('500', 'MovieController', 'JSON_ERROR_STATE_MISMATCH', 'State mismatch (invalid or malformed JSON).');
                    break;
                case JSON_ERROR_CTRL_CHAR:
                    $this->errorResponse('500', 'MovieController', 'JSON_ERROR_CTRL_CHAR', 'Control character error, possibly incorrectly encoded.');
                    break;
                case JSON_ERROR_SYNTAX:
                    $this->errorResponse('500', 'MovieController', 'JSON_ERROR_SYNTAX', 'Syntax error.');
                    break;
                case JSON_ERROR_UTF8:
                    $this->errorResponse('500', 'MovieController', 'JSON_ERROR_UTF8', 'Malformed UTF-8 characters, possibly incorrectly encoded.');
                    break;
                default:
                    $this->errorResponse('500', 'MovieController', 'Unknown error (JSON)', 'Unknown error (JSON).');
                    break;
            }


        } else {

            return $this->errorResponse('503', 'http://www.omdbapi.com', 'Service Unavailable', 'The service is unavailable.');

        }

    }

    private function errorResponse($status, $source, $title, $detail) {
        $error = array('status' => $status,
                       'source' => $source,
                       'title' => $title,
                       'detail' => $detail);
        return $error;
    }
}