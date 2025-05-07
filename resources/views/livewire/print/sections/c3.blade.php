<div class="mx-auto">


    <table class="table table-bordered pds-table">
        <tr class="border-3">
            <td colspan="16" class="bg-secondary text-white pt-1 pb-1" style="font-size: 0.7rem;"><b><i>V. VOLUNTARY
                        WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</i></b></td>
        </tr>

        <tr style="font-size: 0.6rem;">
            <td rowspan="2" class="bg-secondary-subtle text-center align-middle" style="width: 35%;">
                <span class="float-start">29. </span>
                NAME & ADDRESS OF ORGANIZATION<br>(Write in full)
            </td>

            <td colspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap" style="width: 5%;">
                INCLUSIVE DATE OF ATTENDANCE<br>(mm/dd/yyyy)</td>

            <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap"
                style="width: 5%; font-size: 0.4rem;">NUMBER OF HOURS</td>

            <td rowspan="2" class="bg-secondary-subtle text-center align-middle">POSITION/NATURE OF WORK</td>
        </tr>

        <tr class="py-compact">
            <td class="bg-secondary-subtle text-center align-middle py-0">From</td>
            <td class="bg-secondary-subtle text-center align-middle py-0">To</td>
        </tr>

        @php
            $voluntaryWorkWorkExperiences = $volWorkExperiences->take(7)->pad(7, (object) []);
        @endphp

        @foreach ($voluntaryWorkWorkExperiences as $volWorkExp)
            <tr style="font-size: 0.6rem;">
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->organization_name ? $volWorkExp->getOrgAddressAndNameAttribute() : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_from)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_to)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->total_hours ? $volWorkExp->total_hours : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->position ?? 'N/A' }}
                </td>
            </tr>
        @endforeach

        <tr style="font-size: 0.6rem;">
            <td colspan="16" class="bg-secondary-subtle text-danger text-center align-middle py-0"><i>(Continue on
                    separate sheet if necessary)</i></td>
        </tr>
    </table>

    <!-- Learning and Development -->
    <table class="table table-bordered pds-table">
        <tr class="border-3 border-bottom-0">
            <td colspan="16" class="bg-secondary text-white pt-1 pb-0" style="font-size: 0.7rem;"><b><i>VI. LEARNING
                        AND
                        DEVELOPMENT (L&D) INTERVENTIONS/TRAININGS PROGRAMS ATTENDED</i></b></td>
        </tr>
        <tr class="border-3 border-top-0">
            <td colspan="16" class="bg-secondary text-white pt-1 pb-1" style="font-size: 0.5rem;"><b><i>(Start from
                        the
                        most recent L&D/training program and include only the relevant L&D/training taken for the last
                        five (5) years for Division Chief/Executive/Managerial positions)</i></b></td>
        </tr>

        <tr style="font-size: 0.55rem;">
            <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap" style="width: 35%;">
                <span class="float-start">30. </span><br>
                TITLE OF LEARNING AND DEVELOPMENT TRAINING PROGRAMS <br>(Write in full)
            </td>
            <td colspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap"
                style="width: 5%; font-size: 0.6rem;">
                INCLUSIVE DATES OF ATTENDANCE <br>(mm/dd/yyyy)
            </td>
            <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap"
                style="width: 5%; font-size: 0.4rem;">
                NUMBER OF HOURS
            </td>
            <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap">
                Type of LD<br>(Managerial/<br>Supervisory/<br>Technical/etc)
            </td>
            <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap">
                CONDUCTED/SPONSORED BY (Write in full)
            </td>
        </tr>

        <tr style="font-size: 0.6rem;">
            <td class="bg-secondary-subtle py-0 text-center">From</td>
            <td class="bg-secondary-subtle py-0 text-center">To</td>
        </tr>


        @php
            $trainingEntries = $trainings->take(21)->pad(21, (object) []);
        @endphp

        @foreach ($trainingEntries as $training)
            <tr style="font-size: 0.6rem;">
                <td class="text-center fw-bold align-middle text-uppercase">
                    {{ strtoupper(optional($training)->title ?? 'N/A') }}
                </td>
                <td class="text-center fw-bold align-middle text-uppercase">
                    {{ optional($training)->date_from ? \Carbon\Carbon::parse($training->date_from)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="text-center fw-bold align-middle text-uppercase">
                    {{ optional($training)->date_to ? \Carbon\Carbon::parse($training->date_to)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="text-center fw-bold align-middle text-uppercase">
                    {{ optional($training)->total_hours ? $training->total_hours : 'N/A' }}
                </td>
                <td class="text-center fw-bold align-middle">
                    {{ ucwords(optional($training)->type ?? 'N/A') }}
                </td>
                <td class="text-center fw-bold align-middle text-uppercase">
                    {{ optional($training)->sponsored_by ?? 'N/A' }}
                </td>
            </tr>
        @endforeach

        <!-- SEPARATOR -->
        <tr style="font-size: 0.6rem;">
            <td colspan="16" class="bg-secondary-subtle text-danger text-center align-middle py-0"><i>(Continue on
                    separate sheet if necessary)</i></td>
        </tr>
    </table>

    <!-- OTHER INFORMATION -->
    <table class="table table-bordered pds-table">
        <tbody>
            <tr class="border-3 border-bottom-0">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1" style="font-size: 0.7rem;"><b><i>VII. OTHER
                            INFORMATION</i></b></td>
            </tr>

            <tr style="font-size: 0.6rem;">
                <td class="text-center align-middle" style="width: 25%;">
                    <span class="float-start">
                        31.
                    </span>
                    SPECIAL SKILLS and HOBBIES
                </td>
                <td class="text-center align-middle text-nowrap" style="width: 43%;">
                    <span class="float-start">
                        32.
                    </span>
                    NON-ACADEMIC DISTINCTIONS / RECOGNITIONS (Write in full)
                </td>
                <td class="text-center align-middle text-nowrap" style="width: 15%; font-size: 0.5rem;">
                    <span class="float-start">
                        33.
                    </span>
                    MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)
                </td>
            </tr>

            @for ($i = 0; $i < 5; $i++)
                <tr style="font-size: 0.6rem;">
                    <td class="text-center fw-bold align-middle text-uppercase py-1">
                        {{ !empty($skills[$i]) ? $skills[$i]->skill : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase py-1">
                        {{ !empty($recognitions[$i]) ? $recognitions[$i]->recognition : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase py-1">
                        {{ !empty($organizations[$i]) ? $organizations[$i]->organization : 'N/A' }}
                    </td>
                </tr>
            @endfor

            <tr style="font-size: 0.6rem;">
                <td colspan="16" class="bg-secondary-subtle text-danger text-center align-middle py-0"><i>(Continue
                        on
                        separate sheet if necessary)</i></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered pds-table border-top-0" style="border-top: 0;">
        <tr class="border-3 py-compact">
            <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
            <td style="width: 30%;"></td>
            <td class="bg-secondary-subtle align-middle text-center">DATE</td>
            <td style="width: 28%;" class="text-center align-middle">
                {{ \Carbon\Carbon::parse($dateAccomplished)->format('m/d/Y') }}
            </td>
            <td class="align-middle text-center text-nowrap text-white">CSC FORM 212 (Revised 2017) Page 3 of 4</td>
        </tr>
    </table>

    <br>
    {{-- @dd($volWorkExperiences->count()) --}}
    @if($volWorkExperiences->count() > 7)
        <table class="table table-bordered pds-table">
            <tr class="border-3">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1" style="font-size: 0.7rem;"><b><i>V. VOLUNTARY
                            WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</i></b></td>
            </tr>

        @for ($i = 8; $i < 50; $i++)
            @php
                $volWorkExp = $volWorkExperiences->get($i);
            @endphp
            <tr style="font-size: 0.6rem;">
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->organization_name ? $volWorkExp->getOrgAddressAndNameAttribute() : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_from)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_to)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->total_hours ? $volWorkExp->total_hours : 'N/A' }}
                </td>
                <td class="fw-bold text-center align-middle text-uppercase">
                    {{ optional($volWorkExp)->position ?? 'N/A' }}
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

    </table>
    @endif

    @if ($trainings->count() > 22)
        <table class="table table-bordered pds-table">
            <tr class="border-3 border-bottom-0">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-0" style="font-size: 0.7rem;"><b><i>VI. LEARNING AND
                            DEVELOPMENT (L&D) INTERVENTIONS/TRAININGS PROGRAMS ATTENDED</i></b></td>
            </tr>

            @for ($i = 22; $i < 65; $i++)
                @php
                    $training = $trainings->get($i);
                @endphp

                <tr style="font-size: 0.6rem;">
                    <td class="text-center fw-bold align-middle text-uppercase">
                        {{ strtoupper(optional($training)->title ?? 'N/A') }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase">
                        {{ optional($training)->date_from ? \Carbon\Carbon::parse($training->date_from)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase">
                        {{ optional($training)->date_to ? \Carbon\Carbon::parse($training->date_to)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase">
                        {{ optional($training)->total_hours ? $training->total_hours : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle">
                        {{ ucwords(optional($training)->type ?? 'N/A') }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase">
                        {{ optional($training)->sponsored_by ?? 'N/A' }}
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
        </table>
    @endif

    @if ($skills->count() > 5 || $recognitions->count() > 5 || $organizations->count() > 5 )
        <table class="table table-bordered pds-table">
            <tbody>
                <tr class="border-3 border-bottom-0">
                    <td colspan="16" class="bg-secondary text-white pt-1 pb-1" style="font-size: 0.7rem;"><b><i>VII. OTHER
                                INFORMATION</i></b></td>
                </tr>

                @for ($i = 5; $i < 63; $i++)
                    <tr style="font-size: 0.6rem;">
                        <td class="text-center fw-bold align-middle text-uppercase py-1">
                            {{ !empty($skills[$i]) ? $skills[$i]->skill : 'N/A' }}
                        </td>
                        <td class="text-center fw-bold align-middle text-uppercase py-1">
                            {{ !empty($recognitions[$i]) ? $recognitions[$i]->recognition : 'N/A' }}
                        </td>
                        <td class="text-center fw-bold align-middle text-uppercase py-1">
                            {{ !empty($organizations[$i]) ? $organizations[$i]->organization : 'N/A' }}
                        </td>
                    </tr>
                @endfor
            </tbody>

            <table class="table table-bordered pds-table" style="border-top: 0;">
                <tr class="border-3 py-compact">
                    <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
                    <td style="width: 30%;"></td>
                    <td class="bg-secondary-subtle align-middle text-center">DATE</td>
                    <td style="width: 28%;" class="text-center align-middle">03/17/2025</td>
                    <td class="align-middle text-center text-nowrap text-white">CSC FORM 212 (Revised 2017) Page 3 of 4</td>
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

