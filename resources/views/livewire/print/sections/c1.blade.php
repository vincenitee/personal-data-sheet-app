<div class="table-responsive">
    <form action="">
        <table id="pds-table">
            <tbody class="table-header">
                <tr>
                    <td colspan="12" class="h5">
                        <i><b>CS Form No. 212</b></i>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" class="align-top" style="max-height: 12px">
                        <i><b>Revised 2017</b></i>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center">
                        <h1><b>PERSONAL DATA SHEET</b></h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <i><b>WARNING: Any misrepresentation main in the Personal Data
                                Sheet and the Work Experience Sheet shall cause the filing
                                of administative/criminal case/s against the person
                                concerned.</b></i>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <i><b>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA
                                SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM</b></i>
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                        Print legibly. Tick appropriate boxes (
                        <input type="checkbox" checked /> ) ad use seperate sheet if
                        necessary. Indicate N/A if not applicable.
                        <b>DO NOT ABBREVIATE.</b>
                    </td>
                    <td colspan="1" style="border: 1px solid#000b; background: #757575; width: 8%">
                        <small>1. CS ID No.</small>
                    </td>
                    <td colspan="2" class="text-right" style="border: 1px solid #000; width: 20%">
                        <small>(Do not fill up. For CSC use only)</small>
                    </td>
                </tr>
            </tbody>

            <tbody class="table-body">
                <tr>
                    <td colspan="12" class="text-white separator">
                        I. PERSONAL INFORMATION
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">2.</span> SURNAME
                    </td>
                    <td colspan="11" class="fw-bold">{{ strtoupper($personalInformation->last_name) ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="9" class="fw-bold">{{ strtoupper($personalInformation->first_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="align-top" style="background: #dddddd">
                        <small>NAME EXTENSION (JR.,SR)</small>
                        <strong>{{ strtoupper($personalInformation->suffix) ?? 'N/A' }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="11" class="fw-bold">{{ strtoupper($personalInformation->middle_name) ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">3.</span> DATE OF BIRTH<br />
                        <span class="count"></span> (mm/dd/yyyy)
                    </td>
                    <td colspan="5" class="text-center fw-bold" style="border: none;">
                        {{ $personalInformation->birth_date ? \Carbon\Carbon::parse($personalInformation->birth_date)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td colspan="3" class="s-label align-top border-bottom-0">
                        <span class="count">16.</span> CITIZENSHIP
                    </td>
                    <td colspan="3" class="border-bottom-0">
                        <div class="d-flex gap-2 ps-2">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="" id=""
                                    {{ $personalInformation->citizenship === 'filipino' ? 'checked' : '' }} disabled>
                                <label for="">Filipino</label>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="" id=""
                                    {{ $personalInformation->citizenship === 'dual' ? 'checked' : '' }} disabled>
                                <label for="">Dual Citizenship</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0"></td>
                    <td colspan="5" class="border-top-0"></td>
                    <td colspan="3" class="s-label align-top border-0 text-center small">
                        If holder of dual citizenship,
                    </td>
                    <td colspan="3" class="border-top-0 border-bottom-0">
                        <div class="d-flex gap-2 ps-4 align-items-start">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="" id=""
                                    {{ $personalInformation->citizenship_by === 'birth' ? 'checked' : '' }} disabled>
                                <label for="">by birth</label>
                            </div>
                            <div class="d-flex align-items-center"
                                {{ $personalInformation->citizenship === 'naturalization' ? 'checked' : '' }} disabled>
                                <input type="checkbox" name="" id="">
                                <label for="">by naturalization</label>
                            </div>
                        </div>
                        <span class="mt-3">Pls. indicate country:</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">4.</span> PLACE OR BIRTH
                    </td>
                    <td colspan="5" class="fw-bold text-center">
                        {{ strtoupper($personalInformation->birth_place) ?? 'N/A' }}</td>
                    <td colspan="3" class="s-label align-top border-0 text-center small">
                        please indicate the details.
                    </td>
                    <td colspan="3" class="border-top-0"></td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">5.</span> SEX
                    </td>
                    <td colspan="5" class="">
                        <div class="d-flex justify-content-between px-2 align-items-start">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="" id=""
                                    {{ $personalInformation->sex === 'male' ? 'checked' : '' }} disabled>
                                <label for="">Male</label>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="" id=""
                                    {{ $personalInformation->sex === 'female' ? 'checked' : '' }} disabled>
                                <label for="">Female</label>
                            </div>
                        </div>
                    </td>
                    <td colspan="3" class="s-label align-top border-0"></td>
                    <td colspan="3"></td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">6.</span> CIVIL STATUS
                    </td>
                    <td colspan="5" class="border-bottom-0" style="border-bottom: none;">
                        <div class="d-flex flex-wrap">
                            <div class="row pds-2 w-100">
                                <div class="col-6 d-flex align-items-center">
                                    <input type="checkbox" name="" id=""
                                        {{ $personalInformation->civil_status === 'single' ? 'checked' : '' }}
                                        disabled>
                                    <label for="" class="ms-2">Single</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input type="checkbox" name="" id=""
                                        {{ $personalInformation->civil_status === 'married' ? 'checked' : '' }}
                                        disabled>
                                    <label for="" class="ms-2">Married</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input type="checkbox" name="" id=""
                                        {{ $personalInformation->civil_status === 'widowed' ? 'checked' : '' }}
                                        disabled>
                                    <label for="" class="ms-2">Widowed</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input type="checkbox" name="" id=""
                                        {{ $personalInformation->civil_status === 'separated' ? 'checked' : '' }}
                                        disabled>
                                    <label for="" class="ms-2">Separated</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input type="checkbox" name="" id=""
                                        {{ $personalInformation->civil_status === 'others' ? 'checked' : '' }}
                                        disabled>
                                    <label for="" class="ms-2">Other/s</label>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td colspan="2" class="s-label align-top border-bottom-0 small">
                        <span class="count">17.</span> RESIDENTIAL ADDRESS
                    </td>
                    <td colspan="2" class="fw-bold text-center border-end-0">
                        {{ strtoupper($residentialAddress->house_no) ?? 'N/A' }}</td>
                    <td colspan="2" class="fw-bold text-center border-start-0">
                        {{ strtoupper($residentialAddress->street) ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">House/Block/Lot No.</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Street</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fw-bold text-center border-end-0">
                        {{ strtoupper($residentialAddress->subdivision) ?? 'N/A' }}</td>
                    <td colspan="2" class="fw-bold text-center border-start-0">
                        {{ strtoupper($residentialAddress->barangay->name) ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">Subdivision/Village</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Barangay</td>
                </tr>

                {{-- Height --}}
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">7.</span> HEIGHT (m)
                    </td>
                    <td colspan="5" class="border-bottom-0 fw-bold text-center">
                        {{ $personalInformation->height ?? 'N/A' }}m</td>
                    <td colspan="2" class="s-label align-top border-bottom-0"></td>
                    <td colspan="2" class="border-end-0 fw-bold text-center">
                        {{ $residentialAddress->municipality->name ?? 'N/A' }}</td>
                    <td colspan="2" class="border-start-0 fw-bold text-center">
                        {{ strtoupper($residentialAddress->province->name) ?? 'N/A' }}</td>
                </tr>

                {{-- Weight --}}
                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">City/Municipality</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Province</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">8.</span> WEIGHT (kg)
                    </td>
                    <td colspan="5" class="fw-bold text-center">
                        {{ (int) $personalInformation->weight ?? 'N/A' }}kg</td>
                    <td colspan="2" class="s-label border-top-0 text-center">ZIP CODE</td>
                    <td colspan="4" class="fw-bold text-center">{{ $residentialAddress->zip ?? 'N/A' }}</td>
                </tr>

                {{-- Blood Type --}}
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">9.</span> BLOOD TYPE
                    </td>
                    <td colspan="5" class="border-bottom-0 fw-bold text-center">
                        {{ $personalInformation->blood_type ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label border-bottom-0">
                        <span class="count">18.</span> PERMANENT ADDRESS
                    </td>
                    <td colspan="2" class="border-end-0 fw-bold text-center">
                        {{ $permanentAddress->house_no ?? 'N/A' }}</td>
                    <td colspan="2" class="border-start-0 fw-bold text-center">
                        {{ strtoupper($permanentAddress->street) ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">House/Block/Lot No.</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Street</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">10.</span> 10 GSIS ID NO.
                    </td>
                    <td colspan="5" class="border-bottom-0 fw-bold text-center">
                        {{ $employeeIdentifiers['gsis'] ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label border-0"></td>
                    <td colspan="2" class="border-end-0 fw-bold text-center">
                        {{ $permanentAddress->subdivision ?? 'N/A' }}</td>
                    <td colspan="2" class="border-start-0 fw-bold text-center">
                        {{ strtoupper($permanentAddress->barangay->name) ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">Subdivision/Village</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Barangay</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">11.</span> PAG-IBIG NO.
                    </td>
                    <td colspan="5" class="border-bottom-0 fw-bold text-center">
                        {{ $employeeIdentifiers['pagibig'] ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label border-0"></td>
                    <td colspan="2" class="border-end-0 fw-bold text-center">
                        {{ strtoupper($permanentAddress->municipality->name) ?? 'N/A' }}</td>
                    <td colspan="2" class="border-start-0 fw-bold text-center">
                        {{ strtoupper($permanentAddress->province->name) ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label border-top-0 border-bottom-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5" class="border-top-0 border-bottom-0"></td>
                    <td colspan="2" class="s-label align-top border-0 border-top-0"></td>
                    <td colspan="2" class="fst-italic text-center border-end-0">City/Municipality</td>
                    <td colspan="2" class="fst-italic text-center border-start-0">Province</td>
                </tr>

                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">12.</span> PHILHEALTH NO.
                    </td>
                    <td colspan="5" class="fw-bold text-center">{{ $employeeIdentifiers['philhealth'] ?? 'N/A' }}
                    </td>
                    <td colspan="2" class="s-label text-center border-0">ZIP CODE</td>
                    <td colspan="4" class="fw-bold text-center">{{ $permanentAddress->zip ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">13.</span> SSS NO.
                    </td>
                    <td colspan="5" class="fw-bold text-center">{{ $employeeIdentifiers['sss'] ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label">
                        <span class="count">19.</span> TELEPHONE NO.
                    </td>
                    <td colspan="4" class="fw-bold text-center">{{ $personalInformation->telephone_no ?? 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">14.</span> TIN NO.
                    </td>
                    <td colspan="5" class="fw-bold text-center">{{ $employeeIdentifiers['tin'] ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label">
                        <span class="count">20.</span> MOBILE NO.
                    </td>
                    <td colspan="4" class="fw-bold text-center">{{ $personalInformation->mobile_no ?? 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">15.</span> AGENCY EMPLOYEE NO.
                    </td>
                    <td colspan="5" class="fw-bold text-center">{{ $employeeIdentifiers['agency'] ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label">
                        <span class="count">21.</span> EMAIL ADDRESS (if any)
                    </td>
                    <td colspan="4" class="fw-bold text-center">{{ $personalInformation->email ?? 'N/A' }}</td>
                </tr>
            </tbody>

            <tbody class="table-body">
                <tr>
                    <td colspan="12" class="text-white separator">
                        II. FAMILY BACKGROUND
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">22.</span> SPOUSE SURNAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($spouse->last_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="s-label">
                        <span class="count">23.</span> NAME of CHILDREN (Write full name
                        and list all)
                    </td>
                    <td colspan="3" class="s-label text-center" style="width: 18%">
                        DATE OF BIRTH (mm/dd/yyyy)
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="4" class="fw-bold">{{ strtoupper($spouse->first_name) ?? 'N/A' }}</td>
                    <td colspan="1" class="align-top s-label">
                        <small> NAME EXTENSION (JR.,SR)</small>
                        <strong>{{ strtoupper($spouse->suffix) ?? 'N/A' }}</strong>
                    </td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(0)) ? strtoupper($children->get(0)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(0)) ? \Carbon\Carbon::parse($children->get(0)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($spouse->middle_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(1)) ? strtoupper($children->get(1)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(1)) ? \Carbon\Carbon::parse($children->get(1)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> OCCUPATION
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($spouse->occupation) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(2)) ? strtoupper($children->get(2)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(2)) ? \Carbon\Carbon::parse($children->get(2)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> EMPLOYER/BUSINESS NAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($spouse->employer) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(3)) ? strtoupper($children->get(0)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(3)) ? \Carbon\Carbon::parse($children->get(3)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> BUSINESS ADDRESS
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($spouse->businesss_address) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(4)) ? strtoupper($children->get(4)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(4)) ? \Carbon\Carbon::parse($children->get(4)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> TELEPHONE NO.
                    </td>
                    <td colspan="5" class="fw-bold">{{ $spouse->telephone_no ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(5)) ? strtoupper($children->get(5)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(5)) ? \Carbon\Carbon::parse($children->get(5)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">24.</span> FATHER'S SURNAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ $father->last_name ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(6)) ? strtoupper($children->get(6)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(6)) ? \Carbon\Carbon::parse($children->get(6)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="4"class="fw-bold">{{ strtoupper($father->first_name) ?? 'N/A' }}</td>
                    <td colspan="1" class="align-top s-label">
                        <small> NAME EXTENSION (JR.,SR)</small>
                        <strong>{{ $father->suffix ?? 'N/A' }}</strong>
                    </td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(7)) ? strtoupper($children->get(7)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(7)) ? \Carbon\Carbon::parse($children->get(7)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="5"class="fw-bold">{{ strtoupper($father->middle_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(8)) ? strtoupper($children->get(8)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(8)) ? \Carbon\Carbon::parse($children->get(8)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="s-label border-bottom-0">
                        <span class="count">25.</span> MOTHERS MAIDEN NAME
                    </td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(9)) ? strtoupper($children->get(9)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(9)) ? \Carbon\Carbon::parse($children->get(9)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> SURNAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($mother->last_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(10)) ? strtoupper($children->get(10)->fullname) : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(10)) ? \Carbon\Carbon::parse($children->get(10)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="5" class="fw-bold">{{ strtoupper($mother->first_name) ?? 'N/A' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(11)) ? $children->get(11)->fullname : '' }}</td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ !empty($children->get(11)) ? \Carbon\Carbon::parse($children->get(11)->birth_date)->format('m/d/Y') : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    <td colspan="5" class="fw-bold">{{ strtoupper($mother->middle_name) ?? 'N/A' }}</td>
                    <td class="small-text text-danger text-center s-label" colspan="6">
                        <i>(Continue on separate sheet if necessary)</i>
                    </td>
                </tr>
                </tr>
            </tbody>

            <tbody class="table-body">
                <tr>
                    <td colspan="12" class="text-white separator">
                        III. EDUCATIONAL BACKGROUND
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">26.</span>
                        <span class="d-block text-center">LEVEL</span>
                    </td>
                    <td colspan="4" class="s-label border-bottom-0">
                        NAME OF SCHOOL<br />(Write in full)
                    </td>
                    <td colspan="2" class="s-label border-bottom-0">
                        BASIC EDUCATION/DEGREE/COURSE<br />
                        (Write in full)
                    </td>
                    <td colspan="2" class="s-label border-bottom-0">
                        PERIOD OF ATTENDANCE
                    </td>
                    <td colspan="1" class="s-label border-bottom-0">
                        HIGHEST LEVEL/UNITS EARNED<br />(If not graduated)
                    </td>
                    <td colspan="1" class="s-label border-bottom-0">
                        YEAR GRADUATED
                    </td>
                    <td colspan="1" class="s-label border-bottom-0">
                        SCHOLARSHIP/<br />ACADEMIC<br />HONORS<br />RECEIVED
                    </td>
                </tr>
                <tr class="text-center" style="margin-top: -20px">
                    <td colspan="1" class="s-label border-top-0"></td>
                    <td colspan="4" class="s-label border-top-0"></td>
                    <td colspan="2" class="s-label border-top-0"></td>
                    <td colspan="1" class="s-label">From</td>
                    <td colspan="1" class="s-label">To</td>
                    <td colspan="1" class="s-label border-top-0"></td>
                    <td colspan="1" class="s-label border-top-0"></td>
                    <td colspan="1" class="s-label border-top-0"></td>
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
                @endphp

                @foreach ($latestEducation as $level => $e)
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> {{ strtoupper($level) }}
                        </td>
                        <td colspan="4" class="fw-bold text-center text-nowrap">
                            {{ optional($e)->school_name ? strtoupper($e->school_name) : 'N/A' }}
                        </td>
                        <td colspan="2" class="fw-bold text-center text-nowrap">
                            {{ optional($e)->degree_earned ? strtoupper($e->degree_earned) : 'N/A' }}
                        </td>
                        <td colspan="1" class="fw-bold text-center text-nowrap">
                            {{ $e && $e->attendance_from ? \Carbon\Carbon::parse($e->attendance_from)->format('Y') : 'N/A' }}
                        </td>
                        <td colspan="1" class="fw-bold text-center text-nowrap">
                            {{ $e && $e->attendance_to ? \Carbon\Carbon::parse($e->attendance_to)->format('Y') : 'N/A' }}
                        </td>
                        <td colspan="1" class="fw-bold text-center text-nowrap">
                            {{ $e->highest_level_units ?? 'N/A' }}</td>
                        <td colspan="1" class="fw-bold text-center text-nowrap">{{ $e->year_graduated ?? 'N/A' }}
                        </td>
                        <td colspan="1" class="fw-bold text-center text-nowrap">
                            {{ optional($e)->academic_honors ? strtoupper($e->academic_honors) : 'N/A' }}
                        </td>
                    </tr>
                @endforeach
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
                    <td colspan="3" class="text-center fw-bold text-uppercase">
                        {{ $dateAccomplished }}
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
