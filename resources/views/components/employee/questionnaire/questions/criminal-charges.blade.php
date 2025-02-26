
<x-forms.question-card
    number="35 (b)"
    title="Have you been criminally charged before any court?"
>
    <x-forms.question-group name="has_criminal_charge">
        {{-- Date Field --}}
        <div class="col-md-6 col-12">
            <x-forms.input label="Date Filed" model="criminal_charge_date" name="criminal_charge_date"
                type="date" :required="false" />

            {{-- Status --}}
            <x-forms.select
                label="Status of Case/s"
                model="criminal_charge_status"
                name="criminal_charge_status"
                :required="false"
            >
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>
    </x-forms.question-group>
</x-forms.question-card>
