<div class="container h-100">
    <div class="row h-100">
        <div class="col-lg-4 col-md-11 m-auto">
            <div class="card p-4 card-body shadow">
                <x-forms.form wire:submit="save" method="POST">
                    {{-- Logo and Text --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="d-flex flex-column gap-1 align-items-center">
                        <img src="{{ Vite::asset('resources/images/hris-logo-white.png') }}" alt="logo"
                            class="img-fluid" id="login-logo">
                        <div class="d-flex flex-column">
                            <h3 class="fw-bold">Welcome back</h3>
                            <span class="text-muted mx-auto" style="font-size: 0.9rem">Please sign in to
                                continue</span>
                        </div>
                    </div>

                    <div class="row g-3 my-3">
                        {{-- Inputs --}}
                        <div class="col-12">
                            <x-forms.input model="form.email" icon="bi bi-envelope" name="email" label=""
                                :required="false" placeholder="Email Address" />
                        </div>

                        <div class="col-12">
                            <x-forms.input model="form.password" icon="bi bi-key" name="password" label=""
                                type="password" :required="false" placeholder="Password" />
                        </div>
                    </div>

                    <x-forms.button class="w-100">
                        <span>Sign in</span>
                        <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading>
                            <span class="sr-only"></span>
                        </div>
                    </x-forms.button>

                    <div class="mt-3">
                        <p class="text-muted" style="font-size: 0.9rem; margin-bottom: 0;">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}">Register here</a>
                        </p>
                        <p class="text-muted" style="font-size: 0.9rem">
                            <span>Forgot your password?</span>
                            <a href="{{ route('password.request') }}">Reset here</a>
                        </p>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>
