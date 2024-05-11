<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('assests/css/landing.css') }}" rel= "stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <x-element.sidebar/>

    <div class="main_content">
        <div class="info inicio-management">

            @yield('table')
            @yield('content')

            @stack('scripts')

        </div>
    </div>

</body>


</html>
