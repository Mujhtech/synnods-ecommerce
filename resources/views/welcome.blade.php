<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/porto-icons.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.0/swiper-bundle.css" integrity="sha512-85xVunKWH9+w3fBf0ndSXOkkCuEWPbhAtnKKaFM7032omgb+gpRZXxs3bzs8mICAi8lASiYxHBxMcLYJdeJozA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CPoppins:300,400,500,600,700%7cOswald:300,400,500,600,700,800" rel="stylesheet">
    </head>
    <body>
        <div id="app"></div>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
