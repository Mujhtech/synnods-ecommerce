<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Synnods Ecommerce</title>
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CPoppins:300,400,500,600,700%7cOswald:300,400,500,600,700,800" rel="stylesheet">
    </head>
    <body>
        <div id="app"></div>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <script>
            window.config = {
                API_URL: '{{ url('/') }}/api/v1',
                BASE_URL: '{{ url('/') }}',
                APP: 'production'
            }
        </script>
        		<!-- all js here -->
        <script src="{{ asset('assets/js/vendor/jquery-v1.12.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
