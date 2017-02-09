<!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | BME-VIK Felezőbál 2017</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <section>@yield('body')</section>

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>