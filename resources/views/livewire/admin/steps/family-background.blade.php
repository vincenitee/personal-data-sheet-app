<x-card title="Family Background">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size: 14px">
            <tbody>
                <x-table-separator label="Spouse Information" colSpan="2"></x-table-separator>
                <x-table-row label="First Name" :value="$spouse->first_name"></x-table-row>
                <x-table-row label="Middle Name" :value="$spouse->middle_name"></x-table-row>
                <x-table-row label="Last Name" :value="$spouse->last_name"></x-table-row>
                <x-table-row label="Suffix" :value="$spouse->suffix"></x-table-row>
                <x-table-row label="Occupation" :value="$spouse->occupation"></x-table-row>
                <x-table-row label="Employer/Business Name" :value="$spouse->employer"></x-table-row>
                <x-table-row label="Business Address" :value="$spouse->business_address"></x-table-row>
                <x-table-row label="Telephone No" :value="$spouse->telephone_no"></x-table-row>

                <x-table-separator label="Father Information" colSpan="2"></x-table-separator>
                <x-table-row label="First Name" :value="$father->first_name"></x-table-row>
                <x-table-row label="Middle Name" :value="$father->middle_name"></x-table-row>
                <x-table-row label="Last Name" :value="$father->last_name"></x-table-row>
                <x-table-row label="Suffix" :value="$father->suffix"></x-table-row>

                <x-table-separator label="Mother Maiden Information" colSpan="2"></x-table-separator>
                <x-table-row label="First Name" :value="$mother->first_name"></x-table-row>
                <x-table-row label="Middle Name" :value="$mother->middle_name"></x-table-row>
                <x-table-row label="Last Name" :value="$mother->last_name"></x-table-row>

                <x-table-separator label="Children Information" colSpan="2"></x-table-separator>
                @forelse ($children as $children)
                    <x-table-row label="Full Name" :value="$children->fullname"></x-table-row>
                    <x-table-row label="Birth Date" :value="\Carbon\Carbon::parse($children->birth_date)->format('m/d/Y')"></x-table-row>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No Children Information Provided</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [$submissionId, 'family_background'])
</x-card>
