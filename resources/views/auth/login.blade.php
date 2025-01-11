@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
    <div class="container h-100 p-4 d-flex align-items-center justify-content-center">
        <div class="col-lg-4">
            <x-forms.form method="POST" action="/login">
                {{-- Logo --}}
                <div class="d-flex gap-2 flex-column mb-3">
                    <img src="{{ Vite::asset('resources/images/lgu-rosario-logo.png') }}"
                        class="img-fluid rounded-circle mx-auto" style="height: auto; width: 90px;" alt="">
                    <h3 class="fw-bold text-center"> Sign In </h3>
                </div>

                {{-- Form Inputs --}}
                <x-forms.input class="mb-3" label="" name="email" placeholder="Email Address" />
                <x-forms.input class="mb-3" label="" name="password" type="password" placeholder="Password" />
                <x-forms.button>Sign In</x-forms.button>

                {{-- More Actions --}}
                <div class="checkbox mt-3">
                    <span class="text-secondary" style="font-size: 0.9rem">Don't have an account? <a
                            href="/register">Register
                            here</a></span><br>
                    <span class="text-secondary" style="font-size: 0.9rem">Forgot your password? <a href="">Reset
                            here</a></span>
                </div>
            </x-forms.form>
        </div>
    </div>
@endsection
