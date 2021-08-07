<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Synnods Ecommerce</title>
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/porto-icons.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CPoppins:300,400,500,600,700%7cOswald:300,400,500,600,700,800" rel="stylesheet">
    </head>
    <body>
        <div id="app"></div>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <script>
            window.config = {
                API_URL: '{{ url('/') }}/api/v1',
                BASE_URL: '{{ url('/') }}',
                APP: 'development'
            }
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
