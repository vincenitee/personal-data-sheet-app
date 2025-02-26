<x-forms.question-card number="41" title="REFERENCES"
    subtitle="(Person not related by consaguinity or affinity to
                    applicant/appointee)">
    {{-- Entry Container --}}
    <div class="d-flex flex-column gap-2">
        {{-- Entries --}}
        <x-card
            title="References"
            icon="bi-person-lines-fill"
        >
            @foreach ($references as $index => $entry)
                
            @endforeach
        </x-card>
        <div class="card card-body">
            <div class="row g-3">
                <div class="col-sm-6">
                    <x-forms.input label="Fullname" name="reference_name_1" placeholder="e.g Juan G. Dela Cruz"
                        :required="false"></x-forms.input>
                </div>
                <div class="col-sm-6">
                    <x-forms.input label="Address" name="reference_address_1" :required="false"></x-forms.input>
                </div>
                <div class="col-sm-6">
                    <x-forms.input label="Telephone Number" name="reference_telephone_1"
                        :required="false"></x-forms.input>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-end">
                    <button type="button" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash me-1"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-end mt-2">
        <button type="button" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle pt-1"></i>
            <span>Add Row</span>
        </button>
    </div>
</x-forms.question-card>
