<x-card title="Personal Information">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size: 14px">
            <tbody>
                <x-table-row label="First Name" :value="$personalInfo->first_name" />
                <x-table-row label="Middle Name" :value="$personalInfo->middle_name" />
                <x-table-row label="Last Name" :value="$personalInfo->last_name" />
                <x-table-row label="Suffix" :value="$personalInfo->suffix" />
                <x-table-row label="Date of Birth" :value="$personalInfo->birth_date?->format('m/d/Y')" />
                <x-table-row label="Place of Birth" :value="$personalInfo->birth_place" />
                <x-table-row label="Sex" :value="ucwords($personalInfo->sex)" />
                <x-table-row label="Civil Status" :value="ucwords($personalInfo->civil_status)" />
                <x-table-row label="Height" :value="$personalInfo->height ? $personalInfo->height . 'm' : null" />
                <x-table-row label="Weight" :value="$personalInfo->weight ? (int) $personalInfo->weight . 'kg' : null" />
                <x-table-row label="Blood Type" :value="$personalInfo->blood_type" />

                @php
                    $idTypes = [
                        'gsis' => 'GSIS ID NO',
                        'pagibig' => 'PAGIBIG ID NO',
                        'philhealth' => 'PHILHEALTH ID NO',
                        'sss' => 'SSS ID NO',
                        'tin' => 'TIN ID NO',
                        'agency' => 'AGENCY ID NO',
                    ];
                    $identifierMap = $personalInfo->identifiers->pluck('number', 'type')->toArray();
                @endphp

                @foreach ($idTypes as $type => $label)
                    <x-table-row :label="$label" :value="$identifierMap[$type] ?? null" />
                @endforeach

                <x-table-row label="Citizenship" :value="ucwords($personalInfo->citizenship)" />
                <x-table-row label="Citizenship By" :value="ucwords($personalInfo->citizenship_by)" />

                {{-- @dump($residentialAddress) --}}
                @php
                    $addresses = [
                        ['label' => 'Permanent Address', 'data' => $permanentAddress],
                        ['label' => 'Residential Address', 'data' => $residentialAddress],
                    ];
                @endphp

                @foreach ($addresses as $address)
                    <x-table-separator :label="$address['label']" colSpan="2" />

                    @foreach (['region' => 'Region', 'province' => 'Province', 'municipality' => 'Municipality', 'barangay' => 'Barangay', 'subdivision' => 'Subdivision/Village', 'street' => 'Street', 'house_no' => 'House/Block/Lot No'] as $key => $label)
                        <x-table-row :label="$label" :value="$address['data']->$key->name ?? $address['data']->$key" />
                    @endforeach
                @endforeach

                <x-table-row label="Country" :value="ucwords($personalInfo->country)" />
                <x-table-row label="Telephone No" :value="ucwords($personalInfo->telephone_no)" />
                <x-table-row label="Mobile No" :value="ucwords($personalInfo->mobile_no)" />
                <x-table-row label="Email" :value="$personalInfo->email" />
            </tbody>
        </table>

    </div>
    {{-- @dd($personalInfo->entry->id) --}}
    @livewire('admin.comments', [$submissionId, 'personal_information'])
</x-card>
