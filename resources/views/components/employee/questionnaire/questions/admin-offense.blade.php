<x-forms.question-card
    number="35 (a)"
    title="Have you ever been found guilty of any administrative offense?"
>
    <x-forms.question-group name="has_admin_case">
        {{-- Admin Offense Details --}}
        <div class="col-md-6 col-12">
            <x-forms.textarea model="admin_case_details" name="admin_case_details" />
        </div>
    </x-forms.question-group>

</x-forms.question-card>
