<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | {{ $title ?? 'Page Title' }} </title>

    <link rel="shortcut icon" href="{{ asset('images/hris-logo-white.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('build/assets/app-D7eHD1Gb.css') }}">

    <script defer src="{{ asset('build/assets/app-BdMOg7Xo.js') }}"></script>
    @stack('styles')

    @livewireStyles
</head>
<body class="vh-100" style="background: #e9e9e9;">

    @yield('content')

    @stack('scripts')

    @livewireScripts
</body>
</html>
