<x-forms.question-card
    number="37"
    title="Have you ever been separated from the service in any of the following modes: resignation,
    retirement,
    dropped from the rolls, dismissal, termination, end of term, finished contract or phased out
    (abolition)
    in the public or private sector?"
>
    <x-forms.question-group name="has_separation_from_service">
        {{-- Details --}}
        <div class="col-12 col-md-6">
            <x-forms.textarea model="separation_details" name="separation_details" :required="false" />
        </div>
    </x-forms.question-group>
</x-forms.question-card>
