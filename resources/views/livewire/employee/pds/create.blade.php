<div class="row g-2">
    {{-- Form Sections --}}

    <div class="col-lg-3">
        @include('livewire.employee.pds.form-sections')
    </div>

    {{-- Input Section --}}
    <div class="col-lg-9">
        <x-forms.form method="POST">
            {{-- Title --}}
            @include('livewire.employee.pds.form-title')

            {{-- Form Content --}}
            @include("livewire.employee.pds.steps.step-{$currentStep}")

            {{-- Form Navigation --}}
            @include('livewire.employee.pds.form-navigation')
        </x-forms.form>
    </div>
</div>
