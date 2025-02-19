
<x-card
    title="Nationality"
    icon="bi-flag"

>
    <div class="col-lg-3 col-md-4">
            <x-forms.select
                wire:model.live="citizenship"
                name="citizenship"
                label="Citizenship"
                wire:ignore
            >
                <option value="">Choose an option</option>

                @foreach ($citizenships as $key => $label)
                    <option value="{{ $key }}" >
                        {{ $label }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
            wire:model.live="method"
                name="method"
                label="Citizenship By"
                wire:ignore
            >
                <option value="">Choose an option</option>
                @foreach ($citizenshipMethods as $key => $label)
                    <option value="{{ $key }}">
                        {{ $label }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>

        @if(!$is_country_disabled)
        <div class="col-lg-3 col-md-4">
            <x-forms.input
                wire:model.live="country"
                name="country"
                label="Country"
                :required="false"
            />
        </div>
        @endif
</x-card>
{{-- <div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Nationality</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                wire:model.live="citizenship"
                name="citizenship"
                label="Citizenship"
                wire:ignore
            >
                <option value="">Choose an option</option>

                @foreach ($citizenships as $key => $label)
                    <option value="{{ $key }}" >
                        {{ $label }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
            wire:model.live="method"
                name="method"
                label="Citizenship By"
                wire:ignore
            >
                <option value="">Choose an option</option>
                @foreach ($citizenshipMethods as $key => $label)
                    <option value="{{ $key }}">
                        {{ $label }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>

        @if(!$is_country_disabled)
        <div class="col-lg-3 col-md-4">
            <x-forms.input
                wire:model.live="country"
                name="country"
                label="Country"
                :required="false"
            />
        </div>
        @endif
    </div>
</div> --}}
