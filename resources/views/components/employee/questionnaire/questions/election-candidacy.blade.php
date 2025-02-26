<x-forms.question-card
    number="38 (a)"
    title="Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?"
>
    <x-forms.question-group name="is_election_candidate">
        {{-- Details --}}
        <div class="col-12 col-sm-6">
            <x-forms.textarea model="election_details" name="election_details" :required="false" />
        </div>
    </x-forms.question-group>
</x-forms.question-card>
