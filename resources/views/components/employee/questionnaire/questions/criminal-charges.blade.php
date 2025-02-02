<x-forms.question-card
    number="35 (b)"
    title="Have you been criminally charged before any court?"
>
    <x-forms.question-group name="has_criminal_charge">
        {{-- Date Field --}}
        <div class="col-md-6 col-12">
            <x-forms.input icon="bi bi-calendar" label="Date Field" name="criminal_charge_date"
            type="date" :required="false" disabled />

            {{-- Status --}}
            <x-forms.input label="Status of Case/s" name="criminal_charge_status" :required="false" disabled />
        </div>
    </x-forms.question-group>
</x-forms.question-card>
