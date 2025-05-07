@extends('layouts.auth')

@section('content')
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-4 col-md-11 m-auto">
                <div class="card p-4 card-body shadow">

                    <x-forms.form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        {{-- Header --}}
                    <div class="d-flex flex-column gap-1 align-items-center">
                            <h3 class="fw-bold">Confirm Your Password</h3>
                            <span class="text-muted mx-auto">For security reasons, please confirm your password before
                                continuing.</span>
                        </div>

                        {{-- Input Field --}}
                        <div class="row g-3 my-3">
                            <div class="col-12">
                                <x-forms.input model="password" icon="bi bi-key" name="password" label="Password"
                                    type="password" placeholder="Enter your password" required autofocus />
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <x-forms.button class="w-100 btn-primary">
                            <span>Confirm</span>
                        </x-forms.button>

                    </x-forms.form>

                </div>
            </div>
        </div>
    </div>
@endsection
