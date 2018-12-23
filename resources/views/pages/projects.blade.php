<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/theme.css">
    <title></title>
</head>
<body>
<div id="app">
    @yield("content")
</div>
<script src="/js/app.js"></script>
</body>
</html>
