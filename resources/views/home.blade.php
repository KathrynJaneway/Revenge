<!doctype html>
<html>
<head>
    @include('includes.head')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/theme.css">
</head>
<body>
<div class="container">

    <div class="page-header">
        @include('includes.header')
    </div>

    <div id="main" class="row">

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-12 text-center">
            @include('includes.navbar')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-12">
            @yield('content')
        </div>

    </div>

    <div class="footer-copyright text-right py-3">
        @include('includes.footer')
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>