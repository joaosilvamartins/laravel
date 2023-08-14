<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>
        @if(session('msg'))
            <p id="msg">{{session('msg')}}</p>
        @endif

        @yield('content')
        <footer>

        </footer>
    </body>
</html>