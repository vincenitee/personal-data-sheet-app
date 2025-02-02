<div class="container h-100">
    <div class="row h-100">
        <div class="col-lg-4 col-md-11 m-auto">
            <div class="card p-4 card-body shadow">
                <x-forms.form wire:submit="sendResetLink" method="POST">
                    @if (session('status'))
                        <x-flash-message>
                        </x-flash-message>
                    @endif

                    {{-- Logo and Text --}}
                    <div class="d-flex flex-column gap-1 align-items-center mb-2">
                        <img src="{{ Vite::asset('resources/images/hris-logo-white.png') }}" alt="logo"
                            class="img-fluid" id="login-logo">
                        <div class="d-flex flex-column align-items-center mb-3">
                            <h3 class="text-centerfw-bold">Forgot your password?</h3>
                            <span class="text-center text-muted mx-auto" style="font-size: 0.9rem">No problem. Just let
                                us know your email address and we will email you a password reset link that will allow
                                you to choose a new one.</span>
                        </div>
                    </div>

                    {{-- Inputs --}}
                    <div class="mb-3">
                        <x-forms.input model="email" icon="bi bi-envelope" name="email" label=""
                                :required="false" placeholder="Email Address" />
                    </div>

                    <x-forms.button class="w-100">
                        Send password reset link
                        <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading>
                            <span class="sr-only"></span>
                        </div>
                    </x-forms.button>

                </x-forms.form>
            </div>
        </div>
    </div>
</div>
