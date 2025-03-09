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
                    <td colspan="11">{{ $personalInformation->last_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="9">{{ $personalInformation->first_name ?? 'N/A' }}</td>
                    <td colspan="2" class="align-top">
                        <small>{{ $personalInformation->suffix ?? 'N/A' }})</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="11">{{ $personalInformation->middle_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">3.</span> DATE OF BIRTH<br />
                        <span class="count"></span> (mm/dd/yyyy)
                    </td>
                    <td colspan="5">
                        {{ $personalInformation->birth_date ? \Carbon\Carbon::parse($personalInformation->birth_date)->format('m/d/Y') : 'N/A' }}
                    </td>
                    <td colspan="3" class="s-label align-top border-bottom-0">
                        <span class="count">16.</span> CITIZENSHIP
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0"></td>
                    <td colspan="5"></td>
                    <td colspan="3" class="s-label align-top border-0 text-center small">
                        If holder of dual citizenship,
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">4.</span> PLACE OR BIRTH
                    </td>
                    <td colspan="5">{{ $personalInformation->birth_place ?? 'N/A' }}</td>
                    <td colspan="3" class="s-label align-top border-0 text-center small">
                        please indicate the details.
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">5.</span> SEX
                    </td>
                    <td colspan="5">{{ $personalInformation->sex ? ucwords($personalInformation->sex) : 'N/A' }}</td>
                    <td colspan="3" class="s-label align-top border-0"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">6.</span> CIVIL STATUS
                    </td>
                    <td colspan="5">
                        {{ $personalInformation->civil_status ? ucwords($personalInformation->civil_status) : 'N/A' }}
                    </td>
                    <td colspan="2" class="s-label align-top border-bottom-0 small">
                        <span class="count">17.</span> RESIDENTIAL ADDRESS
                    </td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-top-0">
                        <span class="count"></span>
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label align-top border-0"></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">7.</span> HEIGHT (m)
                    </td>
                    <td colspan="5">{{ $personalInformation->height ?? 'N/A' }}m</td>
                    <td colspan="2" class="s-label align-top border-0"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">8.</span> WEIGHT (kg)
                    </td>
                    <td colspan="5">{{ (int) $personalInformation->weight ?? 'N/A' }}kg</td>
                    <td colspan="2" class="s-label border-0 text-center">ZIP CODE</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">9.</span> BLOOD TYPE
                    </td>
                    <td colspan="5">{{ $personalInformation->blood_type ?? 'N/A' }}</td>
                    <td colspan="2" class="s-label border-bottom-0">
                        <span class="count">18.</span> PERMANENT ADDRESS
                    </td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">10.</span> GSIS ID NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label border-0"></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">11.</span> PAG-IBIG NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label border-0"></td>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">12.</span> PHILHEALTH NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label text-center border-0">ZIP CODE</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">13.</span> SSS NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label">
                        <span class="count">19.</span> TELEPHONE NO.
                    </td>
                    <td colspan="4">{{ $personalInformation->telephone_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">14.</span> TIN NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label">
                        <span class="count">20.</span> MOBILE NO.
                    </td>
                    <td colspan="4">{{ $personalInformation->mobile_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count">15.</span> AGENCY EMPLOYEE NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="2" class="s-label">
                        <span class="count">21.</span> EMAIL ADDRESS (if any)
                    </td>
                    <td colspan="4">{{ $personalInformation->email ?? 'N/A' }}</td>
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
                    <td colspan="5"></td>
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
                    <td colspan="4"></td>
                    <td colspan="1" class="align-top s-label">
                        <small> NAME EXTENSION (JR.,SR) </small>
                    </td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> OCCUPATION
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> EMPLOYER/BUSINESS NAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> BUSINESS ADDRESS
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> TELEPHONE NO.
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">24.</span> FATHER'S SURNAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="4"></td>
                    <td colspan="1" class="align-top s-label">
                        <small> NAME EXTENSION (JR.,SR) </small>
                    </td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-bottom-0">
                        <span class="count">25.</span> MOTHERS MAIDEN NAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> SURNAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> FIRST NAME
                    </td>
                    <td colspan="5"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label border-0">
                        <span class="count"></span> MIDDLE NAME
                    <td colspan="5"></td>
                    <td class="small-text text-danger text-center" colspan="6">
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
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> ELEMENTARY
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> SECONDARY
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> VOCATIONAL/<br />
                        <span class="count"></span> TRADE COURSE
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> COLLEGE
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="1" class="s-label">
                        <span class="count"></span> GRADUATE STUDIES
                    </td>
                    <td colspan="4"></td>
                    <td colspan="2"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                    <td colspan="1"></td>
                </tr>
            </tbody>

            <tbody class="table-body">
                <tr>
                    <td class="small-text text-danger text-center" colspan="12">
                        <i>(Continue on separate sheet if necessary)</i>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="text-center">
                        <i><b>SIGNATURE</b></i>
                    </td>
                    <td colspan="6"></td>
                    <td colspan="2" class="text-center">
                        <i><b>DATE</b></i>
                    </td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

@push('styles')
    <style>
        #pds-table {
            width: 100%;
            /* max-width: 9in; */
            margin: 0 auto;
            border: 2px solid #000;
        }

        #pds-table td:not(.separator) {
            font-size: 12px;
            border-color: #000;
            height: 20px;
        }

        #pds-table tbody {
            border: 1px solid #000;
        }

        #pds-table tbody:not(.table-header) td {
            border: 1px solid #000;
        }

        #pds-table .separator {
            font-size: 12px;
            font-style: italic;
            font-weight: 600;
            background-color: #757575;
            border-top-width: 2px !important;
            border-bottom-width: 2px !important;
        }

        #pds-table td.s-label {
            background-color: #dddddd;
            width: 20%;
        }

        #pds-table td .count {
            display: inline-block;
            width: 1.32em;
            text-align: center;
        }

        .table-body.question-block td {
            font-size: 13px !important;
        }

        .table-body.question-block tr td:first-child {
            border-bottom-width: 0px !important;
            border-top-width: 0px !important;
        }

        .table-body.question-block tr td:not(:first-child) {
            border-width: 0px !important;
        }

        .table-body.question-block tr td:nth-child(2) {
            padding-left: 15px;
        }
    </style>
@endpush
