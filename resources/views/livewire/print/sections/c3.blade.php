<div class="table-responsive">
    <table id="pds-table">
        <tbody class="table-body"></tbody>
        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE
                    / VOLUNTARY ORGANIZATION/S
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-bottom-0">
                    <span class="count float-left">29.</span> NAME & ADDRESS OF
                    ORGANIZATION<br />
                    (Write in full)
                </td>
                <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES OF ATTENDANCE <br> (mm/dd/yyyy)</td>
                <td colspan="1" class="s-label border-bottom-0">NUMBER OF HOURS</td>
                <td colspan="3" class="s-label border-bottom-0">
                    POSITION / NATURE OF WORK
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label">From</td>
                <td colspan="1" class="s-label">To</td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="3" class="s-label border-top-0"></td>
            </tr>

            @php
                $volWorkExperiences = $volWorkExperiences->pad(7, (object) []);
            @endphp

            @foreach ($volWorkExperiences as $volWorkExp)
                <tr>
                    <td colspan="6" class="text-center fw-bold">
                        {{ optional($volWorkExp)->organization_name ? strtoupper($volWorkExp->getOrgAddressAndNameAttribute()) : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_from)->format('m/d/Y') : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_to)->format('m/d/Y') : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($volWorkExp)->total_hours ? $volWorkExp->total_hours . ' HOURS' : '' }}
                    </td>
                    <td colspan="3" class="text-center fw-bold">
                        {{ strtoupper(optional($volWorkExp)->position ?? '') }}
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
        </tbody>

        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE
                    / VOLUNTARY ORGANIZATION/S<br />
                    <small><i>(Start from the most recent L&D/training program and include
                            only the relevant L&D/training taken for the last five (5) years
                            for Division Chief/Executive/Managerial positions)</i></small>
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-bottom-0">
                    <span class="count float-left">30.</span> TITLE OF LEARNING AND
                    DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br />
                    (Write in full)
                </td>
                <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES OF ATTENDANCE<br>(mm/dd/yyyy)</td>
                <td colspan="1" class="s-label border-bottom-0" style="width: 15%;">NUMBER OF HOURS</td>
                <td colspan="1" class="s-label border-bottom-0">
                    Type of LD (Managerial/ Supervisory/Technical/etc)
                </td>
                <td colspan="2" class="s-label border-bottom-0 text-nowrap">
                    CONDUCTED/ SPONSORED BY<br />(Write in full)
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label">From</td>
                <td colspan="1" class="s-label">To</td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="2" class="s-label border-top-0"></td>
            </tr>

            @php
                $trainings = $trainings->pad(21, (object) []);
            @endphp

            @foreach ($trainings as $training)
                <tr>
                    <td colspan="6" class="text-center fw-bold">
                        {{ strtoupper(optional($training)->title ?? '') }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($training)->date_from ? \Carbon\Carbon::parse($training->date_from)->format('m/d/Y') : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($training)->date_to ? \Carbon\Carbon::parse($training->date_to)->format('m/d/Y') : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ optional($training)->total_hours ? $training->total_hours . ' HOURS' : '' }}
                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        {{ strtoupper(optional($training)->type ?? '') }}
                    </td>
                    <td colspan="2" class="text-center fw-bold">
                        {{ strtoupper(optional($training)->sponsored_by) }}
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
        </tbody>

        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VIII. OTHER INFORMATION
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="4" class="s-label">
                    <span class="count float-left">31.</span> SPECIAL SKILLS and HOBBIES
                </td>
                <td colspan="4" class="s-label">
                    <span class="count float-left">32.</span> NON-ACADEMIC DISTINCTIONS
                    / RECOGNITION<br />(Write in full)
                </td>
                <td colspan="4" class="s-label">
                    <span class="count float-left">33.</span> MEMBERSHIP IN
                    ASSOCIATION/ORGANIZATION<br />(Write in full)
                </td>
            </tr>

            @for ($i = 0; $i < 6; $i++)
                <tr>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        @if(!empty($skills[$i])) {{ $skills[$i]->skill }}  @endif
                    </td>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        @if(!empty($recognitions[$i])) {{ $recognitions[$i]->recognition }}  @endif
                    </td>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        @if(!empty($organizations[$i])) {{ $organizations[$i]->organization }}  @endif
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
                <td colspan="4" class="text-center s-label">
                    <i><b>SIGNATURE</b></i>
                </td>
                <td colspan="3"></td>
                <td colspan="1" class="text-center s-label">
                    <i><b>DATE</b></i>
                </td>
                <td colspan="4" class="text-center fw-bold">{{ $dateAccomplished }}</td>
            </tr>
        </tbody>
    </table>
</div>
