<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDS | {{ $title ?? 'Page Title' }}</title>

    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/hris-logo-white.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>

<body style="background: #E9E9E9">
    {{-- Main Container --}}
    <div x-data="{ open: true }" class="d-flex" style="min-height: 100vh">
        @role('employee')
            @livewire('employee.sidebar')
        @else
            @livewire('admin.sidebar')
        @endrole

        <div class="flex-1 w-100">
            @include('partials.navbar')

            <main class="container-fluid mt-3" style="background: #E9E9E9">
                @include('partials.breadcrumb')
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Script stack --}}
    @stack('scripts')
</body>

</html>
