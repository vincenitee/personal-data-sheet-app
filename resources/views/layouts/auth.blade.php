<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | {{ $title ?? 'Page Title' }} </title>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/hris-logo-white.png') }}" type="image/x-icon">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="vh-100" style="background: #f8f9fa;">

    @yield('content')
    @livewireScripts
</body>
</html>
