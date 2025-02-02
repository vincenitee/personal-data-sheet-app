<x-forms.question-card
    number="34"
    title="Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau
                or Department where you will be apppointed:">

    {{-- A --}}
    <x-forms.question-group name="has_third_degree_relative">
        <x-slot:question>
            a. within third degree?
        </x-slot:question>
    </x-forms.question-group>

    {{-- B --}}
    <x-forms.question-group name="has_fourth_degree_relative">
        <x-slot:question>
            b. within the fourth degree (for Local Government Unit - Career Employees)?
        </x-slot:question>

        <div class="col-6 d-sm d-md-block"></div>

        {{-- Details --}}
        <div class="col-md-6 col-12">
            <x-forms.textarea model="fourth_degree_details" name="fourth_degree_details" />
        </div>
    </x-forms.question-group>

</x-forms.question-card>
