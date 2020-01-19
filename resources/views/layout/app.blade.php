<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Aplicacion ejemplo</title>

    @yield('css')
</head>

<body>
    <div class="row text-center">
        <div class="col-12">
            <h2>Aplicacion Ejemplo</h2>
            <small>@yield('title')</small>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/43e885f71f.js"></script>
    @yield('scripts')
</body>

</html>
