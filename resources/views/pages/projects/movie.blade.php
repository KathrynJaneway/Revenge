@extends('layouts.app')


@section('content')
    <div class="row col-12 shadowdiv">
        <div class="col-6 offset-1">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est
        </div>
        <!--<movie-title></movie-title>-->
        <div class="col-4 col-md-4">
            <!--<div class="col-5 col-md-5 offset-1" style="margin-top: -140px; margin-left: 70%;">-->
                <div class="input text-center" id="movie_title_title">
                    Please enter the movie title:
                </div>
            <!--</div>
            <div class="col-5 col-md-5 offset-1" id='movie_title_input_div' style="margin-top: -100px; margin-left: 67%;">-->
            <div class="text-center block">
                <input type="text" id="movie_title" placeholder="Movie Title" class="text-center buttonleftround" >
                <input type="button" onclick="movieAPI()" value="Search" class="buttonrightround">
            </div>
            <!--</div>-->
        </div>
    </div>

    <div class="w-100"></div>

    <div class="row padding paddingl">
        <div class="col-3 col-md-3 col-xl-3 offset-1 padding movieprofile paddingb">
            <img id="profilePoster" class="img" src="https://m.media-amazon.com/images/M/MV5BMzZhNjYyZDYtZmE4MC00M2RlLTlhOGItZDVkYTVlZTYxOWZlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SX300.jpg">
        </div>
        <div class="verticalline"></div>
        <div class="col-6 offset-1 movieprofile">
            <h2 class="padding" id="profileMovieTitle">TRON</h2>
            <div class="row">
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Released:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileReleased">
                    09 Jul 1982
                </div>
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Runtime:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileRuntime">
                    96 min
                </div>
            </div>
            <div class="row">
                <div class="padding col-2 col-md-2 col-xl-2 textgrey">
                    Plot:
                </div>
                <div class="padding col-10 col-md-10 col-xl-10" id="profilePlot">
                    A computer hacker is abducted into the digital world and forced to participate in gladiatorial games where his only chance of escape is with the help of a heroic security program.
                </div>
            </div>
            <div class="row padding">
                <div class="col-2 col-md-2 col-xl-2 textgrey">
                    Actors:
                </div>
                <div class="col-10 col-md-10 col-xl-10" id="profileActors">
                    Jeff Bridges, Bruce Boxleitner, David Warner, Cindy Morgan
                </div>
            </div>
            <div class="row padding">
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Website:
                </div>
                <div class="col-10 col-md-10 col-xl-10" id="profileWebsite">
                    No data available!
                </div>
            </div>
            <div class="row padding">
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Director:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileDirector">
                    Steven Lisberger
                </div>
                <div class="col-2 col-md-2 col-xl-2 textgrey">
                    Writer:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileWriter">
                    Steven Lisberger (screenplay), Steven Lisberger (story), Bonnie MacBird (story)
                </div>
            </div>
            <div class="row padding">
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Genre:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileGenre">
                    Action, Adventure, Sci-Fi
                </div>
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Awards:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileAwards">
                    Nominated for 2 Oscars. Another 2 wins & 6 nominations.
                </div>
            </div>
            <div class="row padding paddingb">
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    Production:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileProduction">
                    Buena Vista Pictures
                </div>
                <div class="col-2 col-md-2 col-xl-2 textgrey" >
                    IMDB-ID:
                </div>
                <div class="col-4 col-md-4 col-xl-4" id="profileimdbID">
                    tt0084827
                </div>
            </div>
        </div>

    </div>
@endsection
<script>
 function movieAPI(e) {
     if (document.getElementById("movie_title").value != '') {
         console.log('mop');
         jQuery.ajax({
             url: "/search",  //"/project_movieAPI",
             method: 'post',
             data: {
                 movie_title: document.getElementById("movie_title").value,
             },
             success: function (result) {
                 console.log(JSON.parse(result));
                 movie = JSON.parse(result);
                 console.log(movie.Website);
                 document.getElementById("profileMovieTitle").innerText = movie.Title;
                 document.getElementById("profileReleased").innerText = movie.Released;
                 document.getElementById("profileRuntime").innerText = movie.Runtime;
                 document.getElementById("profilePlot").innerText = movie.Plot;
                 document.getElementById("profileActors").innerText = movie.Actors;
                 document.getElementById("profileDirector").innerText = movie.Director;
                 document.getElementById("profileWriter").innerText = movie.Writer;
                 document.getElementById("profileGenre").innerText = movie.Genre;
                 document.getElementById("profileAwards").innerText = movie.Awards;
                 document.getElementById("profileProduction").innerText = movie.Production;
                 document.getElementById("profileWebsite").innerText = movie.Website;
                 document.getElementById("profileimdbID").innerText = movie.imdbID;
                 document.getElementById("profilePoster").src = movie.Poster;
                 //TODO wenn kein film gefunden wurde error nachricht
                 //TODO poster in die mitte setzen
             }
         });
     }
 }
</script>