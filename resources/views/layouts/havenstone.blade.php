<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Saphira</title>

        <!-- for the vue components of havenstone/gameboard -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- to use jquery -->
        <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/base.css') }}" rel="stylesheet">

    </head>
    <body>
        @guest
            <main class="login">
                @yield('login', View::make('login')) <!--auth/base.blade.php-->
            </main>
        @endguest
        @auth
            <main class="havenstone">
                @yield('havenstone', View::make('havenstone'))  <!--/havenstone.blade.php TODO is it not in this directory -->
            </main>
        @endauth

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

