<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/pictures/favicons/apple-touch-icon.png?rand={{rand()}}">
    <link rel="icon" type="image/png" sizes="32x32" href="/pictures/favicons/favicon-32x32.png?rand={{rand()}}">
    <link rel="icon" type="image/png" sizes="16x16" href="/pictures/favicons/favicon-16x16.png?rand={{rand()}}">
    <link rel="manifest" href="/pictures/favicons/manifest.json?rand={{rand()}}">
    <link rel="mask-icon" href="/pictures/favicons/safari-pinned-tab.svg?rand={{rand()}}" color="#5bbad5">
    <meta name="theme-color" content="transparent">

    <!-- Styles -->

    <link href="//{{ Request::getHost() }}/css/app.css?v=0.0.1" rel="stylesheet">

</head>
<body>
<div id="app" class="app-viewport phone-viewport"><app-main></app-main></div>

<!-- Scripts -->
<script>
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    if(findGetParameter('debug')) {
        window.onerror = function(msg, url, line, col, error) {
            var extra = !col ? '' : '\ncolumn: ' + col;
            extra += !error ? '' : '\nerror: ' + error;
            document.write("Error: " + msg + "\nurl: " + url + "\nline: " + line + extra);
        };
    }
</script>
<script src="//{{ Request::getHost() }}/js/app.js?v=1.4.12"></script>
</body>
</html>
