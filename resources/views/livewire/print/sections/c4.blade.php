<div class="my-auto">
    <!-- Questions -->
    <table class="table pds-table">
        <tbody>
            <!-- 34 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="4" class="bg-secondary-subtle border-end-0 pt-1" style="width: 3%;">34.</td>

                <!-- QUESTION -->
                <td class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0 pt-1 pb-0 text-nowrap"
                    style="width: 52%;">
                    Are you related by consanguinity or affinity to the appointing or recommending authority, or to
                    the<br>
                    chief of bureau or office or to the person who has immediate supervision over you in the Office,
                    <br>
                    Bureau or Department where you will be apppointed,
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0">

                </td>
            </tr>

            <!-- 34a -->
            <tr class="font-xsm">
                <!-- QUESTION -->
                <td class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0"
                    style="width: 52%;">
                    a. within the third degree?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 ">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_third_degree_relative === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 34b -->
            <tr class="font-xsm">
                <!-- QUESTION -->
                <td rowspan="2" class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0 "
                    style="width: 52%;">
                    b. within the fourth degree (for Local Government Unit - Career Employees)?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 ">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_fourth_degree_relative === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 34b. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <label for="">If YES, give details: </label>
                    <input type="text" class="w-100" readonly value="{{ $questions->fourth_degree_relative ?? 'N/A' }}">
                </td>
            </tr>

            <!-- 35 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="5" class="bg-secondary-subtle border-end-0 pt-1 pb-0" style="width: 3%;">35.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1 border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    a. Have you ever been found guilty of any administrative offense?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_admin_case === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 35. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <label for="">If YES, give details: </label>
                    <input type="text" class="w-100" readonly value="{{ $questions->admin_case_details ?? 'N/A' }}">
                </td>
            </tr>

            <!-- 35 -->
            <tr class="font-xsm">
                <!-- QUESTION -->
                <td rowspan="3" class="bg-secondary-subtle pt-1 pb-0 border-1 border-top-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    b. Have you been criminally charged before any court?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_criminal_charge === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 35. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 pb-0 border-top-0 border-bottom-0">
                    <label for="">If YES, give details: </label>
                    <div class="d-flex align-items-end justify-content-end gap-1">
                        <label for="" class="text-nowrap">Date Filed: </label>
                        <input type="text" class="w-50" readonly value="{{ !empty($questions->admin_case_details) ? \Carbon\Carbon::parse($questions->criminal_charge_date)->format('m/d/Y') : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <tr class="font-xsm">
                <td class="pt-0 border-top-0">
                    <div class="d-flex align-items-end justify-content-end gap-1">
                        <label for="" class="text-nowrap">Status of Case/s: </label>
                        <input type="text" class="w-50" readonly value="{{ !empty($questions->criminal_charge_status) ? str_replace('_', ' ', $questions->criminal_charge_status) : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <!-- 36 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-end-0 pt-1 pb-0" style="width: 3%;">36.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1 border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
                    by<br>
                    any court or tribunal?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_criminal_conviction === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 36. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <label for="">If YES, give details: </label>
                    <input type="text" class="w-100" readonly value="{{ !empty($questions->criminal_conviction_details) ? $questions->criminal_conviction_details : 'N/A' }}">
                </td>
            </tr>

            <!-- 37 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-end-0 pt-1 pb-0" style="width: 3%;">37.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1  border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    Have you ever been separated from the service in any of the following modes: resignation,<br>
                    retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or<br>
                    phased out (abolition) in the public or private sector?
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_separation_from_service === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 37. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <label for="">If YES, give details: </label>
                    <input type="text" class="w-100" readonly value="{{ !empty($questions->separation_details) ? $questions->separation_details : 'N/A' }}">
                </td>
            </tr>

            <!-- 38a -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="4" class="bg-secondary-subtle border-end-0 pt-1 pb-0" style="width: 3%;">38.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1 border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    a. Have you ever been a candidate in a national or local election held within the last year
                    (except<br>Barangay election)?
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->is_election_candidate === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 38a. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0 border-bottom-0">
                    <div class="d-flex align-items-end gap-1">
                        <label for="" class="text-nowrap">If YES, give details: </label>
                        <input type="text" class="w-100" readonly value="{{ !empty($questions->election_details) ? $questions->election_details : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <!-- 38b -->
            <tr class="font-xsm">

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1 border-top-0 border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    b. Have you resigned from the government service during the three (3)-month period before the
                    last<br>election to promote/actively campaign for a national or local candidate?
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->has_resigned_for_election === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 38b. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <div class="d-flex align-items-end gap-1">
                        <label for="" class="text-nowrap">If YES, give details: </label>
                        <input type="text" class="w-100" readonly value="{{ !empty($questions->resignation_details) ? $questions->resignation_details : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <!-- 39 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-end-0 pt-1 pb-0" style="width: 3%;">39.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle pt-1 pb-0 border-1  border-bottom-0 border-start-0 text-nowrap"
                    style="width: 52%;">
                    Have you acquired the status of an immigrant or permanent resident of another country?
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0 pt-1 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->is_immigrant === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 39. ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <label for="">If YES, give details (country): </label>
                    <input type="text" class="w-100" readonly value="{{ !empty($questions->immigrant_country) ? $questions->immigrant_country : 'N/A' }}">
                </td>
            </tr>

            <!-- 40 -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td class="bg-secondary-subtle border-bottom-0 border-end-0 pt-1 pb-0" style="width: 3%;">40.</td>

                <!-- QUESTION -->
                <td class="bg-secondary-subtle border-1 border-bottom-0 border-start-0 pt-1 pb-0 text-nowrap"
                    style="width: 52%;">
                    Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA
                    7277);<br>
                    and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0">

                </td>
            </tr>

            <!-- 40a. -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-top-0 border-bottom-0 border-end-0 "
                    style="width: 3%;">a.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0  text-nowrap"
                    style="width: 52%;">
                    Are you a member of any indigenous group?
                </td>

                <!-- RESPONSE -->
                <td class="border-bottom-0 ">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->is_indigenous === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 40a. ADDITIONAL QUESTIONS -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0 border-bottom-0">
                    <div class="d-flex align-items-end gap-1">
                        <label for="" class="text-nowrap">If YES, give specify: </label>
                        <input type="text" class="w-100" readonly value="{{ !empty($questions->indigenous_details) ? $questions->indigenous_details : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <!-- 40b. -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-top-0 border-bottom-0 border-end-0 "
                    style="width: 3%;">b.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0  text-nowrap"
                    style="width: 52%;">
                    Are you a person with disability?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 ">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->is_disabled === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 40b. ADDITIONAL QUESTIONS -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0 border-bottom-0">
                    <div class="d-flex align-items-end gap-1">
                        <label for="" class="text-nowrap">If YES, give specify ID No: </label>
                        <input type="text" class="w-100" readonly value="{{ !empty($questions->disabled_person_id) ? $questions->disabled_person_id : 'N/A' }}">
                    </div>
                </td>
            </tr>

            <!-- 40c. -->
            <tr class="font-xsm">
                <!-- QUESTION NUMBER -->
                <td rowspan="2" class="bg-secondary-subtle border-top-0 border-end-0 " style="width: 3%;">c.</td>

                <!-- QUESTION -->
                <td rowspan="2"
                    class="bg-secondary-subtle border-1 border-top-0 border-bottom-0 border-start-0  text-nowrap"
                    style="width: 52%;">
                    Are you a solo parent?
                </td>

                <!-- RESPONSE -->
                <td class="border-top-0 border-bottom-0 ">
                    <div class="d-flex align-items-center gap-3">
                        @foreach ([1 => 'YES', 0 => 'NO'] as $value => $label)
                            <div class="d-flex gap-1 align-items-center">
                                <input type="checkbox" class="check-sm"
                                    {{ $questions->is_solo_parent === $value ? 'checked' : '' }}
                                >
                                <label for="">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>

            <!-- 40c. ADDITIONAL QUESTIONS -->
            <tr class="font-xsm">
                <td class="pt-1 border-top-0">
                    <div class="d-flex align-items-end gap-1">
                        <label for="" class="text-nowrap">If YES, give specify ID No: </label>
                        <input type="text" class="w-100" readonly value="{{ !empty($questions->solo_parent_id) ? $questions->solo_parent_id : 'N/A' }}">
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

    <!-- Attachments -->
    <table class="table pds-table border-top-0">
        <tbody>
            <tr class="font-xsm">
                <td class="bg-secondary-subtle border-3 border-end-0 border-top-0" style="width: 3%;">41.</td>
                <td colspan="3" class="bg-secondary-subtle border-3 border-start-0 border-top-0 " style="width: 67%;">
                    REFERENCE <span class="text-danger">(Person who is not related by consanguinity to
                        applicant/appointee )</span>
                </td>
                <td class="border-bottom-0"></td>
            </tr>

            <tr class="font-xsm">
                <td colspan="2" class="text-center align-middle bg-secondary-subtle border-1" style="width: 20%;">NAME
                </td>
                <td class="text-center align-middle bg-secondary-subtle border-1">ADDRESS</td>
                <td class="text-center align-middle bg-secondary-subtle"
                    style="border: solid #000; border-width: 0 3px 1px 0; width: 15%;">TEL. NO.</td>
                <td rowspan="5" class="text-center border-top-0 border-bottom-0  px-3">
                    <div class="text-nowrap mb-2 h-100 mx-auto"
                        style="border: 3px solid #000; width: 83%; padding: 5px 0;">
                        ID picture taken within<br>
                        last 6 months<br>
                        3.5cm x 4.5cm<br>
                        (passport size)<br>
                        <br>
                        With full and handwritten<br>
                        name tag and signature over<br>
                        <br>
                        Computer generated<br>
                        or photocopied picture<br>
                        is not acceptable
                    </div>

                    <span class="mt-2">PHOTO</span>
                </td>
            </tr>

            @php
                $referencePersons = $referencePersons->pad(3, (object) []);
            @endphp

            @foreach ($referencePersons as $r)
                <tr class="font-xsm">
                    <td colspan="2" class="text-center align-middle fw-bold border-1" style="width: 20%;">
                        {{ optional($r)->fullname ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold border-1">
                        {{ optional($r)->address ?? 'N/A' }}
                    </td>
                    <td class="text-center align-middle fw-bold " style="border: solid #000; border-width: 0 3px 1px 0;">
                        {{ optional($r)->telephone_no ?? 'N/A' }}
                    </td>
                </tr>
            @endforeach
            <tr class="font-xsm">
                <td class="text-center fw-bold bg-secondary-subtle"
                    style="border: solid #000; border-width: 3px 0 3px 0;">42.</td>
                <td colspan="3" class="fw-bold bg-secondary-subtle text-justify"
                    style="border: solid #000; border-width: 3px 3px 3px 0;">
                    I declare under oath that I have personally accomplished this Personal Data Sheet which is a true,
                    correct and complete
                    statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the
                    Philippines. I authorize
                    the agency head/authorized representative to verify/validate the contents stated herein. I agree
                    that any
                    misrepresentation made in this document and its attachments shall cause the filing of
                    administrative/criminal case/s
                    against me.
                </td>
            </tr>

            <!-- ADDITIONAL INFORMATION -->
            <tr class="font-xsm">
                <td colspan="5" class="pb-0 border-0">
                    <div class="d-flex gap-2 justify-content-between px-0">
                        <table class="table table-bordered" style="border: 3px solid #000;">
                            <tbody>
                                <tr style="font-size: 0.5rem;">
                                    <td colspan="2" class="bg-secondary-subtle text-nowrap">Government Issued ID (i.e
                                        Passport, GSIS, SSS, PRC, Driver's license, etc.)</td>
                                </tr>

                                <tr style="font-size: 0.5rem;">
                                    <td colspan="2" class="bg-secondary-subtle">
                                        <i>PLEASE INDICATE ID Number and Date of Issuance</i>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.5rem;">
                                    <td class="border-end-0 py-1" style="width: 40%;">Government Issued ID: </td>
                                    <td class="fw-bold border-start-0 text-uppercase py-1">
                                        {{ optional($attachment)->government_id_type ? str_replace('_', ' ', $attachment->government_id_type) : 'N/A' }}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.5rem;">
                                    <td class="border-end-0 py-1" style="width: 40%;">ID/License/Passport No: </td>
                                    <td class="fw-bold border-start-0 text-uppercase py-1">
                                        {{ optional($attachment)->government_id_no ?? 'N/A' }}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.5rem;">
                                    <td class="border-end-0 py-1" style="width: 40%;">Date/Place of Issuance: </td>
                                    <td class="fw-bold border-start-0 text-uppercase py-1">
                                        {{ optional($attachment)->date_of_issuance ? \Carbon\Carbon::parse($attachment->date_of_issuance)->format('Y-m-d') : '' }}
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                        <table class="table table-bordered" style="border: 3px solid #000;" >
                            <tbody>
                                <tr style="font-size: 0.5rem;">
                                    <td></td>
                                </tr>
                                <tr style="font-size: 0.5rem;">
                                    <td class="py-1 bg-secondary-subtle text-center" style="height: 10%;">Signature
                                        (Sign inside the box)</td>
                                </tr>
                                <tr style="font-size: 0.7rem; height: 10%;">
                                    <td class="text-center fw-bold py-1">
                                        {{ \Carbon\Carbon::parse($dateAccomplished)->format('m/d/Y') }}
                                    </td>
                                </tr>
                                <tr style="font-size: 0.5rem; height: 5%;">
                                    <td class="bg-secondary-subtle text-center fw-bold py-1">Date Accomplished</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered" style="border: 3px solid #000;">
                            <tbody>
                                <tr style="font-size: 0.5rem;">
                                    <td></td>
                                </tr>
                                <tr style="font-size: 0.5rem; height: 5%;">
                                    <td class="bg-secondary-subtle text-center fw-bold ">Right Thumbmark</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>

            <tr style="font-size: 0.6rem;">
                <td colspan="5" class="border-3 border-bottom-0 text-center text-nowrap">
                    SUBSRCIBED AND SWORN to before me this <input type="text" class="text-center"
                        value="{{ \Carbon\Carbon::parse($dateAccomplished)->format('jS \d\a\y \o\f F Y') }}
">,affiant exhibiting his/her validly issued government issued ID
                    as indicated above
                </td>
            </tr>
            <tr style="font-size: 0.6rem;">
                <td colspan="5" class="text-center border-3 align-middle border-top-0">
                    <table class="table table-bordered mx-auto h-100" style="border: 3px solid #000; width: 40%;">
                        <tbody>
                            <tr class="border-bottom-0 border-top-0" style="font-size: 0.5rem;">
                                <td class="py-2"></td>
                            </tr>
                            <tr class="border-bottom-0 border-top-0" style="font-size: 0.5rem;">
                                <td class="py-2"></td>
                            </tr>
                            <tr class="border-bottom-0 border-top-0" style="font-size: 0.5rem;">
                                <td class="py-2"></td>
                            </tr>
                            <tr style="font-size: 0.6rem; height: 10%;">
                                <td class="bg-secondary-subtle text-center fw-bold py-1">Person Administiring Oath</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr class="font-xsm">
                <td colspan="5" class="text-end fw-bold py-1 text-white">CSC Form 212 (Revised 2017) Page 4 of 4</td>
            </tr>
        </tbody>
    </table>
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
