<div>
    <!-- Document Head -->
    <table class="table table-bordered pds-table">
        <tbody>
            <tr class="border-0 font-xsm">
                <td colspan="3" class="py-0 fw-bold"><i>CSC Form No. 212</i></td>
            </tr>

            <tr class="border-0 font-xsm">
                <td colspan="3" class="py-0 fw-bold"><i>Revised 2017</i></td>
            </tr>

            <tr class="border-0">
                <td colspan="3" class="py-0 fw-bold text-center">
                    <h2>PERSONAL DATA SHEET</h2>
                </td>
            </tr>

            <tr class="border-0 font-xsm">
                <td colspan="3" class="py-0 text-nowrap fw-bold">
                    <i>WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet
                        shall cause the filing of administrative/criminal case/s against the person<br>
                        concerned.</i>
                </td>
            </tr>

            <tr class="border-0 font-xsm">
                <td colspan="3" class="py-0 text-nowrap fw-bold">
                    <i>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS
                        FORM.</i>
                </td>
            </tr>

            <tr class="border-0 font-xsm">
                <td class="py-0 text-nowrap">
                    Print legibly. Tick appropriate boxes (<input type="checkbox" name="" id=""
                        style="height: 10px;">)
                    and use separate sheet if necessary. Indicate N/A if not applicable. <b>DO NOT ABBREVIATE</b>
                </td>
                <td class="py-0 text-nowrap bg-secondary border-1" style="width: 3%;">
                    1. CS ID No.
                </td>
                <td class="py-0 border-1 text-end">
                    (Do not fill up for CSC use only)
                </td>
            </tr>

        </tbody>
    </table>

    <!-- PERSONAL INFORMATION -->
    <table class="table table-bordered pds-table border-bottom-0">
        <tbody>
            <tr class="border-3 border-top-0" style="font-size: 0.7rem;">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>I. PERSONAL INFORMATION</i></b></td>
            </tr>

            <tr class="font-xsm border-bottom-0">
                <td class="py-1 bg-secondary-subtle" style="width: 20%;">2. SURNAME</td>
                <td colspan="3" class="py-1 fw-bold text-uppercase">{{ strtoupper($personalInformation->last_name) ?? 'N/A' }}</td>
            </tr>

            <tr class="font-xsm border-top-0 border-bottom-0">
                <td class="bg-secondary-subtle ps-3" style="width: 20%;">FIRST NAME</td>
                <td colspan="2" class="border-1 fw-bold text-uppercase">{{ strtoupper($personalInformation->first_name) ?? 'N/A' }}</td>
                <td class="border-1 bg-secondary-subtle pt-0 ps-0 text-nowrap text-uppercase"
                    style="width: 20%; font-size: 0.5rem;">
                    NAME EXTENSION (JR., SR.)
                    <span class="float-end">
                        {{ empty($personalInformation->suffix) ? 'N/A' : $personalInformation->suffix }}
                    </span>
                </td>

            </tr>

            <tr class="font-xsm border-top-0">
                <td class="py-1 bg-secondary-subtle ps-3" style="width: 20%;">MIDDLE NAME</td>
                <td colspan="3" class="py-1 border-1 fw-bold text-uppercase">{{ strtoupper($personalInformation->middle_name) ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered pds-table border-top-0 border-bottom-0">
        <tbody>
            <tr class="font-xsm border-bottom-0">
                <td class="bg-secondary-subtle py-1" style="width: 20%;">
                    3. DATE OF BIRTH<br>
                    <span class="d-inline-block ps-2">(mm/dd/yyyy)</span>
                </td>
                <td class="text-center align-middle fw-bold text-uppercase py-1" style="width: 23%;">
                    {{ $personalInformation->birth_date ? \Carbon\Carbon::parse($personalInformation->birth_date)->format('m/d/Y') : 'N/A' }}
                </td>
                <td class="bg-secondary-subtle py-1">16. CITIZENSHIP</td>
                <td class="text-center border-bottom-0 py-1" style="width: 33%;">
                    <div class="d-flex align-items-center gap-4 mb-1">
                        <div class="d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->citizenship === 'filipino' ? 'checked' : '' }}>
                            <label for="">Filipino</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->citizenship === 'dual' ? 'checked' : '' }}>
                            <label for="">Dual Citizenship</label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->citizenship_by === 'birth' ? 'checked' : '' }}>
                            <label for="">by birth</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->citizenship_by === 'naturalization' ? 'checked' : '' }}>
                            <label for="">by naturalization</label>
                        </div>
                    </div>
                </td>
            </tr>

            <tr class="font-xsm border-top-0 border-bottom-0">
                <td class="bg-secondary-subtle border-1 " style="width: 20%;">
                    4. PLACE OF BIRTH<br>
                </td>
                <td class="text-center align-middle fw-bold text-uppercase border-1 " style="width: 23%;">
                    {{ !empty($personalInformation->birth_place) ? $personalInformation->birth_place : 'N/A' }}
                </td>
                <td class="bg-secondary-subtle text-center ">If holder of dual citizenship,</td>
                <td class="text-center border-top-0 " style="width: 33%;">
                    Pls. indicate country:
                </td>
            </tr>

            <tr class="font-xsm border-top-0">
                <td class="bg-secondary-subtle border-1 py-1" style="width: 20%;">
                    5. SEX
                </td>
                <td class="text-center py-1">
                    <div class="row gx-4">
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->sex === 'male' ? 'checked' : '' }}>
                            <label for="">Male</label>
                        </div>
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->sex === 'female' ? 'checked' : '' }}>
                            <label for="">Female</label>
                        </div>
                    </div>
                </td>
                <td class="bg-secondary-subtle text-center py-1">please indicate the details</td>
                <td class="border-1 text-uppercase py-1" style="width: 33%;">
                    {{ empty($personalInformation->country) ? 'PHILIPPINES' : $personalInformation->country }}
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered pds-table border-top-0 border-bottom-0">
        <tbody>
            <tr class="font-xsm border-0">
                <td rowspan="4" class="bg-secondary-subtle py-1" style="width: 20%;">6. CIVIL STATUS</td>
                <td rowspan="2" style="width: 23%;">
                    <div class="row gx-4 gy-1">
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->civil_status === 'single' ? 'checked' : '' }}>
                            <label for="">Single</label>
                        </div>
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->civil_status === 'married' ? 'checked' : '' }}>
                            <label for="">Married</label>
                        </div>
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->civil_status === 'widowed' ? 'checked' : '' }}>
                            <label for="">Widowed</label>
                        </div>
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->civil_status === 'separated' ? 'checked' : '' }}>
                            <label for="">Separated</label>
                        </div>
                    </div>
                </td>

                <td rowspan="6" class="bg-secondary-subtle text-nowrap" style="width: 17.5%;">
                    17.RESIDENTIAL ADDRESS
                </td>

                <td class="text-center align-middle py-1 fw-bold text-uppercase border-end-0" style="width: 20%;">
                    {{ !empty($residentialAddress->house_no) ? $residentialAddress->house_no : 'N/A' }}
                </td>

                <td class="text-center align-middle py-1 fw-bold text-uppercase border-start-0" style="width: 20%;">
                    {{ !empty($residentialAddress->street) ? $residentialAddress->street : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 " style="width: 20%;">
                    <i>House/Block/Lot No.</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 " style="width: 20%;">
                    <i>Street</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td rowspan="2" class="py-0">
                    <div class="row gx-4 gy-1">
                        <div class="col-6 d-flex gap-2">
                            <input type="checkbox" name="" id="" {{ $personalInformation->civil_status === 'others' ? 'checked' : '' }}>
                            <label for="">Other/s:</label>
                        </div>
                    </div>
                </td>

                <!-- Residential Subdivision -->
                <td class="text-center align-middle py-1 fw-bold text-uppercase border-end-0" style="width: 20%;">
                    {{ !empty($residentialAddress->subdivision) ? $residentialAddress->subdivision : 'N/A' }}
                </td>

                <!-- Residential Barangay -->
                <td class="text-center align-middle py-1 fw-bold text-uppercase border-start-0" style="width: 20%;">
                    {{ !empty($residentialAddress->barangay->name) ? $residentialAddress->barangay->name : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 py-0" style="width: 20%;">
                    <i>Subdivision/Village</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 py-0" style="width: 20%;">
                    <i>Barangay</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td rowspan="2" class="bg-secondary-subtle border-1 align-middle">7. HEIGHT (m)</td>

                <td rowspan="2" class="border-1 text-center fw-bold align-middle text-uppercase">
                    {{ !empty($personalInformation->height) ? $personalInformation->height : 'N/A' }}
                </td>
                <!-- Residential Municipality -->
                <td class="text-center align-middle py-1 fw-bold text-uppercase border-end-0" style="width: 20%;">
                    {{ !empty($residentialAddress->municipality->name) ? $residentialAddress->municipality->name : 'N/A' }}
                </td>
                <!-- Residential Province -->
                <td class="text-center align-middle py-1 fw-bold text-uppercase border-start-0" style="width: 20%;">
                    {{ !empty($residentialAddress->province->name) ? $residentialAddress->province->name : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 py-0" style="width: 20%;">
                    <i>City/Municipality</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 py-0" style="width: 20%;">
                    <i>Province</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td class="border-1 bg-secondary-subtle align-middle py-1">8. WEIGHT (kg)</td>

                <td class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ !empty($personalInformation->weight) ? (int) $personalInformation->weight : 'N/A' }}
                </td>

                <td class="bg-secondary-subtle text-center py-1">ZIP CODE</td>

                <td colspan="2" class="text-center fw-bold py-1">
                    {{ !empty($residentialAddress->zip) ? $residentialAddress->zip : 'N/A' }}
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td rowspan="2" class="border-1 bg-secondary-subtle align-middle">9. BLOOD TYPE</td>

                <td rowspan="2" class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ !empty($personalInformation->blood_type) ? $personalInformation->blood_type : 'N/A' }}
                </td>

                <td rowspan="6" class="bg-secondary-subtle border-1 text-nowrap" style="width: 17.5%;">
                    18.PERMANENT ADDRESS
                </td>

                <!-- Permanent House No -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-end-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->house_no) ? $permanentAddress->house_no : 'N/A' }}
                </td>

                <!-- Permanent Street -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-start-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->street) ? $permanentAddress->street : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 py-0" style="width: 20%;">
                    <i>House/Block/Lot No.</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 py-0" style="width: 20%;">
                    <i>Street</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td rowspan="2" class="border-1 bg-secondary-subtle align-middle">10. GSIS ID NO</td>

                <td rowspan="2" class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['gsis'] ?? 'N/A' }}
                </td>

                <!-- Permanent Subdivision -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-end-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->subdivision) ? $permanentAddress->subdivision : 'N/A' }}
                </td>

                <!-- Permanent Barangay -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-start-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->barangay->name) ? $permanentAddress->barangay->name : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 py-0" style="width: 20%;">
                    <i>Subdivision/Village</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 py-0" style="width: 20%;">
                    <i>Barangay</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td rowspan="2" class="border-1 bg-secondary-subtle align-middle">11. PAG-IBIG ID NO</td>

                <td rowspan="2" class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['pagibig'] ?? 'N/A' }}
                </td>

                <!-- Permanent Municipality -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-end-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->municipality->name) ? $permanentAddress->municipality->name : 'N/A' }}
                </td>

                <!-- Permanent Province -->
                <td class="text-center align-middle py-1 fw-bold border-1 text-uppercase border-start-0"
                    style="width: 20%;">
                    {{ !empty($permanentAddress->province->name) ? $permanentAddress->province->name : 'N/A' }}
                </td>
            </tr>

            <!-- Labels -->
            <tr class="font-xsm border-0">
                <td class="text-center align-middle border-1 border-end-0 py-0" style="width: 20%;">
                    <i>City/Municipality</i>
                </td>

                <td class="text-center align-middle border-1 border-start-0 py-0" style="width: 20%;">
                    <i>Province</i>
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td class="border-1 bg-secondary-subtle align-middle py-1">12. PHILHEALTH NO</td>

                <td class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['philhealth'] ?? 'N/A' }}
                </td>

                <td class="bg-secondary-subtle text-center py-1 border-1">ZIP CODE</td>

                <td colspan="2" class="text-center fw-bold py-1 border-1">
                    {{ !empty($permanentAddress->zip) ? $permanentAddress->zip : 'N/A' }}
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td class="border-1 bg-secondary-subtle align-middle py-1">13. SSS NO</td>

                <td class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['sss'] ?? 'N/A' }}
                </td>

                <td class="bg-secondary-subtle py-1 border-1">19. TELEPHONE NO</td>

                <td colspan="2" class="text-center fw-bold py-1 border-1 text-uppercase">
                    {{ $personalInformation->telephone_no ?? 'N/A' }}
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td class="border-1 bg-secondary-subtle align-middle py-1">14. TIN NO</td>

                <td class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['tin'] ?? 'N/A' }}
                </td>

                <td class="bg-secondary-subtle py-1 border-1">20. MOBILE NO</td>

                <td colspan="2" class="text-center fw-bold py-1 border-1 text-uppercase">
                    {{ $personalInformation->mobile_no ?? 'N/A' }}
                </td>
            </tr>

            <tr class="font-xsm border-0">
                <td class="border-1 bg-secondary-subtle align-middle py-1">15. AGENCY EMPLOYEE NO</td>

                <td class="border-1 text-center fw-bold align-middle text-uppercase py-1">
                    {{ $employeeIdentifiers['agency'] ?? 'N/A' }}
                </td>

                <td class="bg-secondary-subtle py-1 border-1">21. E-MAIL ADDRESS <span style="font-size: 0.5rem;">(if
                        any)</span></td>

                <td colspan="2" class="text-center fw-bold py-1 border-1">
                    {{ $personalInformation->email ?? 'N/A' }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Family Background -->
    <table class="table table-bordered pds-table border-top-0">
        <tr class="border-3 border-top-0" style="font-size: 0.7rem;">
            <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>II. FAMILY BACKGROUND</i></b></td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 border-1 border-bottom-0" style="width: 20%;">22.
                SPOUSE'S SURNAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->last_name ?? 'N/A'  }}
            </td>
            <td class="align-middle bg-secondary-subtle py-1 border-1">23. NAME of CHILDREN</td>
            <td class="align-middle bg-secondary-subtle  py-1 border-1">DATE OF BIRTH <span
                    style="font-size: 0.5rem;">(mm/dd/yyyy)</span></td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">FIRST NAME</td>
            <td class="fw-bold align-middle text-uppercase py-1" style="width: 23%;">
                {{ $spouse->first_name ?? 'N/A'  }}
            </td>
            <td class="pt-0 bg-secondary-subtle py-1 ps-0" style="width: 17.5%; font-size: 0.5rem;">NAME
                EXTENSION(JR., SR.) <span class="float-end">{{ $spouse->suffix ?? 'N/A'  }}</span></td>
            <td class="text-center fw-bold align-middle text-uppercase py-1">
                {{ $children->get(0)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1">
                {{ !empty($children->get(0)) ? \Carbon\Carbon::parse($children->get(0)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">MIDDLE NAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->middle_name ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(1)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(1)) ? \Carbon\Carbon::parse($children->get(1)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4 border-1" style="width: 20%;">OCCUPATION</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->occupation ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(2)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(2)) ? \Carbon\Carbon::parse($children->get(2)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-3 border-1 text-nowrap" style="width: 20%;">EMPLOYER/BUSINESS NAME
            </td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->employer ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(3)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(3)) ? \Carbon\Carbon::parse($children->get(3)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4 border-1" style="width: 20%;">BUSINESS ADDRESS</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->business_address ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(4)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(4)) ? \Carbon\Carbon::parse($children->get(4)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4 border-1" style="width: 20%;">TELEPHONE NO</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $spouse->telephone_no ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(5)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(5)) ? \Carbon\Carbon::parse($children->get(5)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 border-1 border-bottom-0" style="width: 20%;">24.
                FATHER'S SURNAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $father->last_name ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(6)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(6)) ? \Carbon\Carbon::parse($children->get(6)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">FIRST NAME</td>
            <td class="fw-bold align-middle text-uppercase py-1" style="width: 23%;">
                {{ $father->first_name ?? 'N/A'}}
            </td>
            <td class="pt-0 bg-secondary-subtle py-1 ps-0" style="width: 17.5%; font-size: 0.5rem;">NAME
                EXTENSION(JR., SR.) <span class="float-end">{{ $father->suffix ?? 'N/A' }}</span></td>
            <td class="text-center fw-bold align-middle text-uppercase py-1">
                {{ $children->get(7)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1">
                {{ !empty($children->get(7)) ? \Carbon\Carbon::parse($children->get(7)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">MIDDLE NAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $father->middle_name ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(8)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(8)) ? \Carbon\Carbon::parse($children->get(8)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td colspan="3" class="bg-secondary-subtle align-middle py-1 border-1 border-bottom-0"
                style="width: 20%;">25. MOTHER'S MAIDEN NAME</td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(9)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(9)) ? \Carbon\Carbon::parse($children->get(9)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">SURNAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $mother->last_name ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(10)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(10)) ? \Carbon\Carbon::parse($children->get(10)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">FIRST NAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $mother->first_name ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ $children->get(11)->fullname ?? 'N/A' }}
            </td>
            <td class="text-center fw-bold align-middle text-uppercase py-1 border-1">
                {{ !empty($children->get(11)) ? \Carbon\Carbon::parse($children->get(11)->birth_date)->format('m/d/Y') : 'N/A' }}
            </td>
        </tr>

        <tr class="font-xsm border-0">
            <td class="bg-secondary-subtle align-middle py-1 ps-4" style="width: 20%;">MIDDLE NAME</td>
            <td colspan="2" class="fw-bold align-middle text-uppercase py-1 border-1" style="width: 23%;">
                {{ $mother->middle_name ?? 'N/A' }}
            </td>
            <td colspan="2" class="text-center fw-bold align-middle bg-secondary-subtle text-danger py-1 border-1">
                <i>(Continue on separate sheet if necessary)</i></td>
        </tr>
    </table>

    <!-- Educational Background -->
    <table class="table table-bordered pds-table border-top-0 border-bottom-0">
        <tbody>
            <tr class="border-3 border-top-0" style="font-size: 0.7rem;">
                <td colspan="16" class="bg-secondary text-white pt-1 pb-1"><b><i>III. EDUCATIONAL BACKGROUND</i></b>
                </td>
            </tr>

            <tr class="border-0" style="font-size: 0.5rem;">
                <td rowspan="2" class="bg-secondary-subtle text-center align-middle text-nowrap"
                    style="width: 20%;">
                    <span class="float-start align-self-start">26. </span>
                    LEVEL
                </td>

                <td rowspan="2" class="bg-secondary-subtle text-center align-middle" style="width: 23%;">
                    NAME OF SCHOOL<br>
                    (Write in full)
                </td>

                <td rowspan="2" class="bg-secondary-subtle text-center align-middle px-1">
                    BASIC EDUCATION/DEGREE/COURSE<br>
                    (Write in full)
                </td>

                <td colspan="2" class="bg-secondary-subtle text-center align-middle px-0">
                    PERIOD OF ATTENDANCE<br>
                </td>

                <td rowspan="2" class="bg-secondary-subtle text-center align-middle px-1">
                    HIGHEST LEVEL/<br>
                    UNITS EARNED<br>
                    (If not graduated)
                </td>

                <td rowspan="2" class="bg-secondary-subtle text-center align-middle px-0">
                    YEAR<br>
                    GRADUATED
                </td>

                <td rowspan="2" class="bg-secondary-subtle text-center align-middle px-0">
                    SCHOLARHIP/<br>
                    ACADEMIC HONORS<br>
                    RECEIVED
                </td>
            </tr>

            <tr style="font-size: 0.5rem;">
                <td class="bg-secondary-subtle text-center align-middle py-0">From</td>
                <td class="bg-secondary-subtle text-center align-middle py-0">To</td>
            </tr>

            @php
                // Define the five education levels that must always appear
                $educationLevels = [
                    'Elementary',
                    'Secondary',
                    'Vocational/Trade Course',
                    'College',
                    'Graduate Studies',
                ];

                // Fetch and filter the latest education background per level
                $latestEducation = collect($educationLevels)->mapWithKeys(function ($level) use (
                    $educationalBackgrounds,
                ) {
                    return [
                        $level => $educationalBackgrounds
                            ->where('level', strtolower($level))
                            ->sortByDesc('year_graduated')
                            ->first(),
                    ];
                });

                // Check if all entries are null
                $allEducationalLevelEmpty = $latestEducation->every(fn($e) => empty($e));
                $paddingClass = $allEducationalLevelEmpty ? 'py-2' : 'py-2';
            @endphp

            @foreach ($latestEducation as $level => $e)
                <tr style="font-size: {{ empty($e) ? '0.5rem' : '0.6rem' }};">
                    <td class="bg-secondary-subtle align-middle ps-3 text-uppercase {{ $paddingClass }}">{{ $level }}</td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ optional($e)->school_name ? strtoupper($e->school_name) : 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ optional($e)->degree_earned ? strtoupper($e->degree_earned) : 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ $e && $e->attendance_from ? \Carbon\Carbon::parse($e->attendance_from)->format('Y') : 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ $e && $e->attendance_to ? \Carbon\Carbon::parse($e->attendance_to)->format('Y') : 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ $e->highest_level_units ?? 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ $e->year_graduated ?? 'N/A' }}
                    </td>
                    <td class="fw-bold text-center align-middle text-uppercase {{ $paddingClass }}">
                        {{ optional($e)->academic_honors ? $e->academic_honors : 'N/A' }}
                    </td>
                </tr>
            @endforeach


            <tr class="font-xsm">
                <td colspan="8"
                    class="text-center fw-bold align-middle bg-secondary-subtle text-danger py-0 border-1 border-dark">
                    <i>(Continue on separate sheet if necessary)</i></td>
            </tr>
        </tbody>
    </table>

    <!-- Signatories -->
    <table class="table table-bordered pds-table border-top-0" style="border-top: 0;">
        <tr class="border-3 font-xsm">
            <td class="bg-secondary-subtle align-middle text-center" style="width: 21%;">SIGNATURE</td>
            <td style="width: 30%;" class="py-1"></td>
            <td class="bg-secondary-subtle align-middle text-center">DATE</td>
            <td style="width: 28%;" class="text-center align-middle">
                {{ \Carbon\Carbon::parse($dateAccomplished)->format('m/d/Y') }}
            </td>
            <td class="align-middle text-center text-nowrap text-white">CSC FORM 212 (Revised 2017) Page 1 of 4</td>
        </tr>
    </table>

    {{-- EXTRA SHEETS FOR CHILDREN --}}
    @if ($children->count() > 12)
        <br>
        <table class="table table-bordered pds-table border-top-0">
            <tr class="font-xsm border-0">
                <td class="align-middle bg-secondary-subtle py-1 border-1">23. NAME of CHILDREN</td>
                <td class="align-middle bg-secondary-subtle  py-1 border-1">DATE OF BIRTH <span style="font-size: 0.5rem;">(mm/dd/yyyy)</span></td>
            </tr>

            @for ($i = 12; $i < 70; $i++)
                @php
                    $additionalChild = $children->get($i);
                @endphp

                <tr style="font-size: 0.6rem;">
                    <td class="text-center fw-bold align-middle text-uppercase py-1">
                        {{ !empty($additionalChild) ? $additionalChild->fullname : 'N/A' }}
                    </td>
                    <td class="text-center fw-bold align-middle text-uppercase py-1">
                        {{ !empty($additionalChild) ? \Carbon\Carbon::parse($additionalChild->birth_date)->format('m/d/Y') : 'N/A' }}
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

    {{-- @dd($levelsWithNoBackground) --}}
    @if($allEducationalLevelEmpty)
        <br>
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
