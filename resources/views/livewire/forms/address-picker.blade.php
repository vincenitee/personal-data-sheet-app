<div>
    {{-- Start of Residential Address --}}
    <div class="card card-body mb-2">
        <div class="row g-3">
            <div class="col-12">
                <small class="fw-bold">Residential Address</small>
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.select name="residential.region" wire:model.live="residential.region" label="Region">
                    <option value="">Choose an option</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region['id'] }}">{{ $region['name'] }}</option>
                    @endforeach
                </x-forms.select>
            </div>


            <div class="col-lg-3 col-md-4">
                <x-forms.select name="residential.province" wire:model.live="residential.province" label="Province"
                    :disabled="empty($residential['provinces'])">
                    <option value="">Choose a province</option>
                    @foreach ($residential['provinces'] as $province)
                        <option value="{{ $province['id'] }}">
                            {{ $province['name'] }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.select name="residential.municipality" wire:model.live="residential.municipality"
                    label="Municipality" :disabled="empty($residential['municipalities'])">
                    <option value="">Choose a municipality</option>
                    @foreach ($residential['municipalities'] as $municipality)
                        <option value="{{ $municipality['id'] }}">
                            {{ $municipality['name'] }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.select name="residential.barangay" wire:model.live="residential.barangay" label="Barangay"
                    :disabled="empty($residential['barangays'])">
                    <option value="">Choose a barangay</option>
                    @foreach ($residential['barangays'] as $barangay)
                        <option value="{{ $barangay['id'] }}">
                            {{ strtoupper($barangay['name']) }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.input name="residential.subdivision" wire:model.live="residential.subdivision"
                    label="Subdivision/Village" :required="false" :disabled="empty($residential['barangays'])" />
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.input name="residential.street" wire:model.live="residential.street" label="Street"
                    :disabled="empty($residential['barangays'])" />
            </div>

            <div class="col-lg-3 col-md-4">
                <x-forms.input name="residential.house" wire:model.live="residential.house" label="House\Lot\Block No."
                    :disabled="empty($residential['barangays'])" />
            </div>

        </div>
    </div>
    {{-- End of Residential Address --}}

    {{-- Start of Permanent Address --}}
    <div class="card card-body mb-2">
        <div class="row g-3">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <small class="fw-bold">Permanent Address</small>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" wire:model.live="isSameAddress"
                            @disabled(is_null($residential['barangay']))>
                        <label class="form-check-label"><small>Same as Residential</small></label>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div class="col-12 text-center" wire:loading wire:target="isSameAddress">
                @include('partials.loading', ['target' => 'isSameAddress', 'message' => 'Syncing address...'])
            </div>

            <!-- Address Fields (Hidden During Sync) -->
            <div wire:loading.remove wire:target="isSameAddress" class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <x-forms.select name="permanent.region" wire:model.live="permanent.region" label="Region">
                        <option value="">Choose an option</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region['id'] }}"
                                {{ $permanent['region'] == $region['id'] ? 'selected' : '' }}>
                                {{ $region['name'] }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.select name="permanent.province" wire:model.live="permanent.province" label="Province"
                        :disabled="empty($permanent['provinces'])">
                        <option value="">Choose a province</option>
                        @foreach ($permanent['provinces'] as $province)
                            <option value="{{ $province['id'] }}"
                                {{ $permanent['province'] == $province['id'] ? 'selected' : '' }}>
                                {{ $province['name'] }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.select name="permanent.municipality" wire:model.live="permanent.municipality"
                        label="Municipality" :disabled="empty($permanent['municipalities'])">
                        <option value="">Choose a municipality</option>
                        @foreach ($permanent['municipalities'] as $municipality)
                            <option value="{{ $municipality['id'] }}"
                                {{ $permanent['municipality'] == $municipality['id'] ? 'selected' : '' }}>
                                {{ $municipality['name'] }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.select name="permanent.barangay" wire:model.live="permanent.barangay" label="Barangay"
                        :disabled="empty($permanent['barangays'])">
                        <option value="">Choose a barangay</option>
                        @foreach ($permanent['barangays'] as $barangay)
                            <option value="{{ $barangay['id'] }}"
                                {{ $permanent['barangay'] == $barangay['id'] ? 'selected' : '' }}>
                                {{ strtoupper($barangay['name']) }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.input name="permanent.subdivision" wire:model.live="permanent.subdivision"
                        label="Subdivision/Village" :required="false" :disabled="empty($permanent['barangays'])" />
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.input name="permanent.street" wire:model.live="permanent.street" label="Street"
                        :disabled="empty($permanent['barangays'])" />
                </div>

                <div class="col-lg-3 col-md-4">
                    <x-forms.input name="permanent.house" wire:model.live="permanent.house" label="House\Lot\Block No."
                        :disabled="empty($permanent['barangays'])" />
                </div>
            </div>
        </div>
    </div>


    {{-- End of Permanent Address --}}
</div>
