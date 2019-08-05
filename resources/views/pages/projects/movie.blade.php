@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-6 offset-1">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
            takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
        <!--<movie-title></movie-title>-->

        <div class="col-6 col-md-6 offset-1">
            <div class="input" id="movie_title_title" style="padding-bottom: -550px; padding-top: 60px;">
                Please enter the movie title:
            </div>
        </div>
        <div class="col-6 col-md-6 offset-1" id='movie_title_input_div'>
            <input type="text" id="movie_title" placeholder="Movie Title" style="padding-top: -550px; margin-top: -40px;">
            <input type="button" onclick="movieAPI()" value="Search">
        </div>
    </div>

    <div class="w-100"></div>

    <div class="row padding">
        <div class="col-3 offset-1">
            <img src="https://m.media-amazon.com/images/M/MV5BMDU2ZWJlMjktMTRhMy00ZTA5LWEzNDgtYmNmZTEwZTViZWJkXkEyXkFqcGdeQXVyNDQ2OTk4MzI@._V1_SX300.jpg">
        </div>
        <div class="col-3 offset-1">
            <ul>
                <li>Title</li>
                <li>Released</li>
                <li>Runtime</li>
                <li>Genre</li>

                <li>Actors</li>
                <li>Director</li>
                <li>Writer</li>

                <li>Production</li>
                <li>Awards</li>

                <li>Plot</li>

                <li>Website</li>
            </ul>
        </div>
    </div>
@endsection
<script>
 function movieAPI(e) {
     if (document.getElementById("movie_title").value != '') {
         console.log('mop');
         jQuery.ajax({
             url: "/project_movieAPI",
             method: 'post',
             data: {
                 movie_title: document.getElementById("movie_title").value,
             },
             success: function (result) {
                 console.log(result);
             }
         });
     }
 }
</script>