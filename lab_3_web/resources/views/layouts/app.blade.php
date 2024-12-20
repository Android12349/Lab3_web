<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/js/index.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="{{ asset('laravel/portugal.png') }}" class="me-2" alt="...">
            <a class="navbar-brand" href="{{ url('/') }}">Города Португалии</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="nav-link ms-auto me-1" href="{{ url('/cities/trashed') }}" id="liveToastBtn">Soft deleted</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p>Редикульцев Андрей</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
