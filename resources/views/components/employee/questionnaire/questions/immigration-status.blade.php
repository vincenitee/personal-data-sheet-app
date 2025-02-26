<x-forms.question-card
    number="39"
    title="Have you acquired the status of an immigrant or permanent resident of another country?"
>
    <x-forms.question-group name="is_immigrant">
        {{-- Details --}}
        <div class="col-12 col-md-6">
            <x-forms.input label="Country" :required="false" model="immigrant_country" name="immigrant_country" placeholder="e.g., Europe"></x-forms.input>
        </div>
    </x-forms.question-group>
</x-forms.question-card>
