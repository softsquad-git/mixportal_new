<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <meta name="keywords" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    @yield('facebook_meta')
    <meta name="robots" content="index, follow">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI_jGXlQWPpqJCKXXhzHjXsuQn7NkFdPU&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>
<body>

<div id="app">
    @include('front.partials.facebook_widget')

    @include('front.partials.navbar')

    <main class="content-page">
        @yield('content')

        @include('layouts.footer')
    </main>
</div>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>


@yield('customScripts')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
