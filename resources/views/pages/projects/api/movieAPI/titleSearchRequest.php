<?php

/**
        $movie_title = str_replace(' ', '_', $_POST['movie_title']);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://www.omdbapi.com/?t=".$movie_title."&apikey=922e836");
        $responsebody = curl_exec($ch);
        //DB::table('movie')->insert(['imdbID' => 'tt4667116', 'Year' => 2015]);
        curl_close ($ch);
        echo var_dump($responsebody);

**/


?>

