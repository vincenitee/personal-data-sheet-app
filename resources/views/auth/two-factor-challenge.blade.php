@extends('layouts.auth')

@section('content')
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-4 col-md-11 m-auto">
                <div class="card p-4 card-body shadow">

                    <x-forms.form method="POST" action="{{ route('two-factor.login.store') }}">
                        @csrf

                        {{-- Flash Message --}}
                        @if (session('flash'))
                            <x-flash-message />
                        @endif

                        {{-- Header --}}
                        <div class="d-flex flex-column gap-1 align-items-center">
                            <h3 class="fw-bold">Two-Factor Authentication</h3>
                            <span class="text-muted mx-auto">Enter your authentication code to continue.</span>
                        </div>

                        {{-- Input Fields --}}
                        <div class="row g-3 my-3">
                            {{-- Authenticator App Code --}}
                            <div class="col-12">
                                <x-forms.input model="code" icon="bi bi-shield-lock" name="code"
                                    label="Authenticator Code" placeholder="6-digit code" autofocus />
                            </div>

                            {{-- Recovery Code (Optional) --}}
                            <div class="col-12">
                                <x-forms.input model="recovery_code" icon="bi bi-key" name="recovery_code"
                                    label="Recovery Code (Optional)" placeholder="Enter recovery code if needed" />
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <x-forms.button class="w-100 btn-primary">
                            <span>Verify Code</span>
                        </x-forms.button>
                    </x-forms.form>

                </div>
            </div>
        </div>
    </div>
@endsection
