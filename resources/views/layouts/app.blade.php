<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/ico/ico.png">

        <title>@yield('title')</title>

        <link href="{{ asset('css/sweet-castle.css') }}" rel="stylesheet">
        @livewireStyles

    </head>
    <body>
        @yield('content')

        <script src="/js/app.js"></script>
        @livewireScripts
    </body>
</html>
