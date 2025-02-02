<x-forms.question-card
    number="38 (b)"
    title="Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?"
>
    <x-forms.question-group name="has_resigned_for_election">
        {{-- Details --}}
        <div class="col-12 col-md-6">
            <x-forms.textarea name="resignation_details" :required="false" />
        </div>
    </x-forms.question-group>
</x-forms.question-card>
