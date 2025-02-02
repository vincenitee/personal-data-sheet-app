<x-forms.question-card
    number="39"
    title="Have you acquired the status of an immigrant or permanent resident of another country?"
>
    <x-forms.question-group name="is_immigrant">
        {{-- Details --}}
        <div class="col-12 col-md-6">
            <x-forms.select
                label="Country"
                name="immigrant_country"
                :required="false"
                disabled
            >
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>
    </x-forms.question-group>
</x-forms.question-card>
