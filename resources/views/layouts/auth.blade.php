<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | @yield('title') </title>

    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/hris-logo-black.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js',])
</head>

<body class="vh-100" style="background: #f8f9fa">

    @yield('content')

</body>

</html>
