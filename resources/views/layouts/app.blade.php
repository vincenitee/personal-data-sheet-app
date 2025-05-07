<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDS | {{ $title ?? 'Page Title' }}</title>

    <link rel="shortcut icon" href="{{ asset('images/hris-logo-white.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('build/assets/app-D7eHD1Gb.css') }}">
    <script defer src="{{ asset('build/assets/app-BdMOg7Xo.js') }}"></script>

    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}

    @livewireStyles

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

    @livewireScripts
</body>

</html>
