<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | {{ $title ?? 'Page Title' }} </title>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/hris-logo-white.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body style="background: #f8f9fa">
    {{-- Main Container --}}
    <div x-data="{ open: false }" class="d-flex" style="min-height: 100vh">
        @include('partials.employee.sidebar')

        <div class="flex-1 w-100" style="background: #E9E9E9">
            @include('partials.employee.navbar')

            <main class="container-fluid mt-3" style="z-index: 1;">
                @include('partials.breadcrumb')
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
