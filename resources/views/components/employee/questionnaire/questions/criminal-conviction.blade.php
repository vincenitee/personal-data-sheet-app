<x-forms.question-card
    number="36"
    title="Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
    by any court or tribunal?"
>
    <x-forms.question-group name="has_criminal_conviction">
        {{-- Details --}}
        <div class="col-12 col-md-6">
            <x-forms.textarea model="criminal_conviction_details" name="criminal_conviction_details"  />
        </div>
    </x-forms.question-group>
</x-forms.question-card>
