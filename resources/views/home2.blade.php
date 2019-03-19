<!doctype html>
<html>
<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/theme.css">
</head>

<div class="container-header container-fluid">

    <header>
        @include('includes.header')
    </header>

</div>

<body>
    <div class="container-sidebar container-fluid">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-12 text-center">
            @include('includes.navbar')
        </div>

    </div>

    <div class="container-content container-fluid">

        <div class="row">
            <div class="body" class="col-md-12 text-center">
                Hello World!

            </div>
        </div>

    </div>

    <div class="container-copyright container-fluid">

        <div class="footer-copyright" class="col-md-12 text-center">
            @include('includes.footer')
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>