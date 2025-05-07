<div>
    <table class="table table-bordered pds-table border-bottom-0" style="width: 100%; border-bottom: none;">
        <!-- CIVIL SERVICE ELIGIBILITY -->
        <tbody>
            <tr class="border-3">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>IV. CIVIL SERVICE ELIGIBILITY</i></b></td>
            </tr>

            <tr style="font-size: 0.6rem;">
                <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap" style="width: 40%;"><span class="float-start">27. </span>CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER<br>SPECIAL LAWS/ CES/ CSEE<br>BARANGAY ELIGIBILITY / DRIVER'S LICENSE</td>
                <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap">RATINGS<br>(If applicable)</td>
                <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap">DATE OF<br>EXAMINATION/<br>CONFERMENT</td>
                <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap" style="width: 30%;">PLACE OF EXAMINATION/CONFERMENT</td>
                <td colspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap">LICENSE(if applicable)</td>
            </tr>

            <tr style="font-size: 0.6rem;">
                <td class="bg-secondary-subtle text-center align-middle">NUMBER</td>
                <td class="bg-secondary-subtle text-center align-middle">Date of validity</td>
            </tr>

            @for ($i = 0; $i < 7; $i++)
                @php
                    $eligibility = $eligibilities->get($i);
                @endphp

                <tr style="font-size: 0.6rem;">
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->career_service ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->ratings ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->exam_date ? \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->exam_place ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->license_number ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($eligibility)->license_validity ? \Carbon\Carbon::parse($eligibility->license_validity)->format('m/d/Y') : 'N/A' }}
                    </td>
                </tr>
            @endfor


            <tr class="border-3" style="font-size: 0.6rem;">
                <td colspan="6" class="bg-secondary-subtle align-middle text-center text-danger py-0">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered pds-table" style="width: 100%;">
        <!-- WORK EXPERIENCE -->
        <tbody>
            <tr class="border-3 border-bottom-0">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>VI. WORK EXPERIENCE</i></b></td>
            </tr>
            <tr class="border-3 border-top-0" style="font-size: 0.6rem;">
                <td colspan="16" class="bg-secondary text-white py-0"><b><i>(Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience Sheet</i></b></td>
            </tr>

            <tr style="font-size: 0.6rem;">
                <td colspan="2" class="bg-secondary-subtle align-middle text-center" style="width: 30%;"><span class="float-start">28. </span>INCLUSIVE DATES<br>(mm/dd/yyyy)</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap">POSITION TITLE<br>(Write in full/Do not abbreviate)</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap">DEPARTMENT/AGENCY/OFFICE/COMPANY<br>(Write in full/Do not abbreviate)</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap">MONTHLY SALARY</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap" style="font-size: 0.5rem;">SALARY/ JOB/ PAY<br>GRADE (if<br>applicable)& STEP<br>(Format "00-0")/<br>INCREMENT</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap">STATUS OF<br>APPOINTMENT</td>
                <td rowspan="2" class="bg-secondary-subtle align-middle text-center text-nowrap">GOV'T<br>SERVICE<br>(Y/N)</td>
            </tr>

            <tr class="py-compact">
                <td class="bg-secondary-subtle align-middle text-center">From</td>
                <td class="bg-secondary-subtle align-middle text-center">To</td>
            </tr>
            {{-- <span class="badge bg-info">{{ $workExperiences->count() }}</span> --}}

            @php
                $rowCount = $workExperiences->count() > 26 ? 26 : 27;
            @endphp

            @for ($i = 0; $i < $rowCount; $i++)
                @php
                    $experience = $workExperiences->get($i);
                @endphp

                <tr style="font-size: 0.6rem;">

                    <td class="text-center align-middle fw-bold">
                        {{ optional($experience)->date_from ? \Carbon\Carbon::parse($experience->date_from)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold">
                        {{-- CHECK IF THERE IS A STARTING DATE --}}
                        {{-- IF THERE IS A STARTING DATE BUT THERE IS NO END DATE THEN IT MUST BE THE CURRENT WORK OF THE EMPLOYEE --}}
                        {{-- {{ !empty($experience->date_from) && !empty($experience->date_to) ?
                            \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') : 'PRESENT' }} --}}
                        {{ !empty($experience->date_from) && empty($experience->date_to) ?
                            'PRESENT' : (!empty($experience->date_to) ? \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') : 'N/A') }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($experience)->position ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-uppercase">
                        {{ optional($experience)->agency ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold">
                        {{ $experience?->salary ? number_format($experience->salary, 2) : 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold">
                        {{ optional($experience)->salary_grade ? $experience->salary_grade . '-' . optional($experience)->salary_step : 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold text-nowrap">
                        {{ optional($experience)->status ? str_replace('_', ' ', $experience->status) : 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold">
                        {{
                            $experience?->government_service ?
                            $experience->government_service === true ?
                            'Y' : 'N'
                            : 'N/A'
                        }}
                    </td>
                </tr>

            @endfor

            <tr style="font-size: 0.6rem;">
                <td colspan="8" class="bg-secondary-subtle text-center align-middle text-danger py-0"><i>(Continue on separate sheet if necessary)</i></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered pds-table">
        <tr class="border-3 py-compact">
            <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
            <td style="width: 30%;"></td>
            <td class="bg-secondary-subtle align-middle text-center">DATE</td>
            <td style="width: 28%;" class="text-center align-middle">
                {{ \Carbon\Carbon::parse($dateAccomplished)->format('m/d/Y') }}
            </td>
            <td class="align-middle text-center text-white text-nowrap">CSC FORM 212 (Revised 2017) Page 2 of 4</td>
        </tr>
    </table>

    {{-- EXTRA SHEET FOR CIVIL SERVICE ELIGIBILITY --}}
    @if($eligibilities->count() > 7)
        <table class="table table-bordered pds-table border-bottom-0" style="width: 100%; border-bottom: none;">
            <tbody>
                <tr class="border-3">
                    <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>IV. CIVIL SERVICE ELIGIBILITY</i></b></td>
                </tr>

                @for ($i = 8; $i < 50; $i++)
                    @php
                        $eligibility = $eligibilities->get($i);
                    @endphp
                    {{-- @dd($eligibilities->get($i)) --}}
                    <tr style="font-size: 0.6rem;">
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->career_service) ? $eligibility->career_service : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->ratings) ? $eligibility->ratings : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->exam_date) ? \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->exam_place) ? $eligibility->exam_place : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->license_number) ? $eligibility->license_number : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ !empty($eligibility?->license_validity) ? \Carbon\Carbon::parse($eligibility->license_validity)->format('m/d/Y') : 'N/A' }}
                        </td>
                    </tr>
                @endfor

                <table class="table table-bordered pds-table" style="border-top: 0;">
                    <tr class="border-3 py-compact">
                        <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
                        <td style="width: 30%;"></td>
                        <td class="bg-secondary-subtle align-middle text-center">DATE</td>
                        <td style="width: 28%;" class="text-center align-middle">03/17/2025</td>
                        <td class="align-middle text-center text-nowrap text-white">CSC FORM 212 (Revised 2017) Page 3 of 4</td>
                    </tr>
                </table>
            </tbody>
        </table>
        <br>
    @endif

    {{-- EXTRA SHEET FOR THE WORK EXPERIENCE --}}
    @if ($workExperiences->count() > 26)
        <table class="table table-bordered pds-table" style="width: 100%;">
            <!-- CIVIL SERVICE ELIGIBILITY -->
            <tbody>
                <!-- 20 rows -->
                <tr class="border-3 border-bottom-0">
                    <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>VI. WORK EXPERIENCE</i></b></td>
                </tr>
                <tr class="border-3 border-top-0" style="font-size: 0.6rem;">
                    <td colspan="16" class="bg-secondary text-white py-0"><b><i>(Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience Sheet</i></b></td>
                </tr>

                @for ($i = 27; $i < 68; $i++)
                    @php
                        $experience = $workExperiences->get($i);
                    @endphp
                    <tr style="font-size: 0.6rem;">
                        <td class="text-center align-middle fw-bold">
                            {{ optional($experience)->date_from ? \Carbon\Carbon::parse($experience->date_from)->format('m/d/Y') : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold">
                            {{-- CHECK IF THERE IS A STARTING DATE --}}
                            {{-- IF THERE IS A STARTING DATE BUT THERE IS NO END DATE THEN IT MUST BE THE CURRENT WORK OF THE EMPLOYEE --}}
                            {{-- {{ !empty($experience->date_from) && !empty($experience->date_to) ?
                                \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') : 'PRESENT' }} --}}
                            {{ !empty($experience->date_from) && empty($experience->date_to) ?
                                'PRESENT' : (!empty($experience->date_to) ? \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') : 'N/A') }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ optional($experience)->position ?? 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-uppercase">
                            {{ optional($experience)->agency ?? 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold">
                            {{ $experience?->salary ? number_format($experience->salary, 2) : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold">
                            {{ optional($experience)->salary_grade ? $experience->salary_grade . '-' . optional($experience)->salary_step : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold text-nowrap">
                            {{ optional($experience)->status ? str_replace('_', ' ', $experience->status) : 'N/A' }}
                        </td>
                        <td class="text-center align-middle fw-bold">
                            {{
                                $experience?->government_service ?
                                $experience->government_service === true ?
                                'Y' : 'N'
                                : 'N/A'
                            }}
                        </td>
                    </tr>
                @endfor
            </tbody>

            <table class="table table-bordered pds-table">
                <tr class="border-3 py-compact">
                    <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
                    <td style="width: 30%;"></td>
                    <td class="bg-secondary-subtle align-middle text-center">DATE</td>
                    <td style="width: 28%;" class="text-center align-middle">03/17/2025</td>
                    <td class="align-middle text-center text-nowrap text-white">CSC FORM 212 (Revised 2017) Page 2 of 4</td>
                </tr>
            </table>
        </table>
    @endif
</div>

@push('styles')
    <style>
        @font-face {
            font-family: 'Arial Black Custom';
            src: url('fonts/arial_black.ttf') format('truetype');
        }

        .pds-table {
            border-collapse: collapse;
            max-width: 9in;
            margin: auto;
            font-size: 0.875rem;
            font-family: 'Arial Narrow', Arial, sans-serif;
            border: 3px solid #000;
            /* table-layout: fixed; */
        }

        .pds-table h2 {
            font-family: 'Arial Black Custom', Arial Black, Arial, sans-serif;
        }

        .pds-table input[type="checkbox"]{
            accent-color: gray;
        }

        .pds-table .form-check-input:checked {
            background-color: var(--bs-secondary) !important;
            border-color: var(--bs-secondary) !important
        }

        .pds-table input[type="text"] {
            border: solid #000;
            border-width: 0 0 1px 0;
        }

        .border-right {
            border: solid #000;
            border-width: 0 3px 0 0;
            margin: 1.5rem;
        }

        .border-top-secondary {
            border-top-color: var(--bs-secondary-bg) !important;
        }

        .py-compact {
            padding-top: 0.1rem !important;
            padding-bottom: 0.1rem !important;
            font-size: 0.7rem !important;
        }

        .font-xsm {
            font-size: 0.6rem;
        }

        .check-sm {
            height: 10px;
        }

    </style>
@endpush
