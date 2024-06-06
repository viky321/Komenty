<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Vimma') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>

<header class="site-header">
    @include("navigation")
    <h1 class="title logo"></h1>
    <a href="/">Vimma</a>
</header>

<main id="app" class="columns is-centered">
    <section class="column is-three-fifthen">
        @yield("content")
    </section>

    @if(session('flash'))
        <flash-message :text="`{{ session('flash') }}`"></flash-message>
    @endif
</main>

</body>
</html>






