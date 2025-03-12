<div class="table-responsive">
    <table id="pds-table">
        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    IV. CIVIL SERVICE ELIGIBILITY
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="5" class="s-label border-bottom-0" style="width: 30%">
                    <span class="count float-left">27.</span>
                    CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE
                    BARANGAY ELIGIBILITY / DRIVER'S LICENSE
                </td>
                <td colspan="1" class="s-label border-bottom-0">
                    RATING<br />(If Applicable)
                </td>
                <td colspan="2" class="s-label border-bottom-0">
                    DATE OF EXAMINATION / CONFERMENT
                </td>
                <td colspan="2" class="s-label border-bottom-0">
                    PLACE OF EXAMINATION / CONFERMENT
                </td>
                <td colspan="2" class="s-label border-bottom-0">
                    LICENSE<br />(if applicable)
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="5" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="2" class="s-label border-top-0"></td>
                <td colspan="2" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label">NUMBER</td>
                <td colspan="1" class="s-label">Date of Validity</td>
            </tr>
            {{-- Entry Start --}}
            @for ($i = 0; $i < 7; $i++)
                @php
                    $eligibility = $eligibilities->get($i);
                @endphp

                <tr>
                    <td colspan="5" class="text-center fw-bold text-nowrap">
                        {{ strtoupper(optional($eligibility)->career_service ?? '') }}
                    </td>
                    <td colspan="1" class="text-center fw-bold text-nowrap">
                        {{ optional($eligibility)->ratings ?? '' }}
                    </td>
                    <td colspan="2" class="text-center fw-bold text-nowrap">
                        {{ optional($eligibility)->exam_date ? \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') : '' }}
                    </td>
                    <td colspan="2" class="text-center fw-bold text-nowrap">
                        {{ strtoupper(optional($eligibility)->exam_place ?? '') }}
                    </td>
                    <td colspan="1" class="text-center fw-bold text-nowrap">
                        {{ optional($eligibility)->license_number ?? '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold text-nowrap">
                        {{ optional($eligibility)->license_validity ? \Carbon\Carbon::parse($eligibility->license_validity)->format('m/d/Y') : '' }}
                    </td>
                </tr>
            @endfor
        </tbody>

        <tbody class="table-body">
            <tr>
                <td class="small-text text-danger text-center s-label" colspan="12">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
        </tbody>

        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    V. WORK EXPERIENCE<br />
                    <small><i>(Include private employment. Start from your recent work)
                            Description of duties should be indicated in the attached Work
                            Experience sheet.</i></small>
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="1" class="s-label border-bottom-0" style="width: 20%">
                    <span class="count float-left">28.</span>
                    INCLUSIVE DATES<br />(mm/dd/yyyy)
                </td>
                <td colspan="5" class="s-label border-bottom-0">
                    POSITION TITLE<br />
                    (Write in full/Do not abbreviate)
                </td>
                <td colspan="2" class="s-label border-bottom-0">
                    DEPARTMENT/AGENCY/OFFICE/COMPANY<br />
                    (Write in full/Do not abbreviate)
                </td>
                <td colspan="1" class="s-label border-bottom-0">
                    MONTHLY<br />SALARY
                </td>
                <td colspan="1" class="s-label border-bottom-0">
                    <small>SALARY/ JOB/ PAY<br />GRADE (if applicable)& STEP (Format
                        "00-0")/ INCREMENT</small>
                </td>
                <td colspan="1" class="s-label border-bottom-0">
                    STATUS OF<br />APPOINTMENT
                </td>
                <td colspan="1" class="s-label border-bottom-0">
                    GOV'T SERVICE<br />
                    <small>(Y/ N)</small>
                </td>
            </tr>
            <tr>
                <td colspan="1" class="p-0">
                    <table class="w-100 border-0">
                        <tbody class="border-0">
                            <tr class="text-center">
                                <td class="s-label border-0 border-bottom-0" style="width: 50%">
                                    From
                                </td>
                                <td class="s-label border-top-0 border-end-0 border-bottom-0" style="width: 50%">
                                    To
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="5" class="s-label border-start-0 border-top-0"></td>
                <td colspan="2" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
            </tr>

            {{-- Entry Starts --}}
            @for ($i = 0; $i < 27; $i++)
                @php
                    $experience = $workExperiences->get($i);
                @endphp

                <tr>
                    <td colspan="1" class="p-0">
                        <table class="w-100 border-0">
                            <tbody class="border-0">
                                <tr>
                                    <td class="border-0 border-bottom-0 fw-bold text-center" style="width: 50%">
                                        {{ optional($experience)->date_from ? \Carbon\Carbon::parse($experience->date_from)->format('m/d/Y') : '' }}
                                    </td>
                                    <td class="border-top-0 border-end-0 border-bottom-0 fw-bold text-center"
                                        style="width: 50%">
                                        {{ optional($experience)->date_to ? \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') : '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td colspan="5" class="text-center fw-bold">
                        {{ strtoupper(optional($experience)->position ?? '') }}
                    </td>
                    <td colspan="2" class="text-center fw-bold">
                        {{ strtoupper(optional($experience)->agency ?? '') }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($experience)->salary ?? '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($experience)->salary_grade ? $experience->salary_grade . '-' . optional($experience)->salary_step : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($experience)->status ? ucwords(str_replace('_', ' ', $experience->status)) : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($experience)->government_service ? 'Y' : '' }}
                    </td>
                </tr>
            @endfor
        </tbody>

        <tbody class="table-body">
            <tr>
                <td class="small-text text-danger text-center s-label" colspan="12">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
            <tr>
                <td colspan="1" class="text-center s-label">
                    <i><b>SIGNATURE</b></i>
                </td>
                <td colspan="6"></td>
                <td colspan="2" class="text-center s-label">
                    <i><b>DATE</b></i>
                </td>
                <td colspan="3" class="text-center fw-bold">
                    {{ $dateAccomplished }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
