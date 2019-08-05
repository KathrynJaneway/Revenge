<template>
    <div class="row" id="example-1">
        <!--<div class="col-6 col-md-6 offset-1">
            <div class="input" id="movie_title_title" style="padding-bottom: -550px; padding-top: 60px;">
                Please enter the movie title:
            </div>
        </div>
        <div class="col-6 col-md-6 offset-1" id='movie_title_input_div'>
            <input type="text" name="movie_title" placeholder="Movie Title" style="padding-top: -550px; margin-top: -40px;">
            <input type="button" v-on:click="movieAPI()" value="Search">
        </div>
        <div class="col-5 col-md-5 offset-1">-->

            <button v-on:click="counter += 1">Add 1</button>
            <p>The button above has been clicked {{ counter }} times.</p>

    </div>
</template>
<script>
    var vm = new Vue({
        data: {
            // declare message with an empty value
            counter: 0
        },
        template: '<div>{{ counter }}</div>'
    })
</script>