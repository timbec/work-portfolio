<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tim Beckett Web Portfolio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- <link rel="stylesheet" href="https://use.typekit.net/dxe7rkb.css"> -->

            <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <div id="content" v-cloak>

                @yield('content')

        </div>
            <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    </body>
</html>
