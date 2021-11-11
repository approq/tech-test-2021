<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Tech Test 2021</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}"/>

    </head>

    <body>
        <noscript>You need to enable JavaScript to run this app.</noscript>

        <div id="app"></div>

        <script src="{{ mix('/js/main.js') }}"></script>
    </body>
</html>
