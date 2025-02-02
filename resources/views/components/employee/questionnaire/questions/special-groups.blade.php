<x-forms.question-card
    number="40"
    title="Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:"
>
    {{-- Indigineous member --}}
    <x-forms.question-group name="is_indigineous">
        <x-slot:question>
            a. Are you a member of any indigenous group?
        </x-slot:question>

        <div class="col-6 d-none d-md-block"></div>

        {{-- Details --}}
        <div class="col-md-6 col-12 mb-3 ">
            <x-forms.input label="If YES, give details:" model="indigenous_details" name="indigenious_details" :required="false" placeholder="Please specify your indigenous group" disabled/>
        </div>
    </x-forms.question-group>

    {{-- Person with disability --}}
    <x-forms.question-group name="is_disabled">
        <x-slot:question>
            b. Are you a person with disability?
        </x-slot:question>

        <div class="col-6 d-none d-md-block"></div>

        {{-- Details --}}
        <div class="col-md-6 col-12 mb-3 ">
            <x-forms.input label="If YES, please specify ID No" model="pwd_id_no" name="pwd_id_no" :required="false" placeholder="Enter your ID Number" disabled/>
        </div>
    </x-forms.question-group>

    {{-- Solo parent --}}
    <x-forms.question-group name="is_solo_parent">
        <x-slot:question>
            c. Are you a solo parent?
        </x-slot:question>

        <div class="col-6 d-none d-md-block"></div>

        {{-- Details --}}
        <div class="col-md-6 col-12 mb-3 ">
            <x-forms.input label="If YES, please specify ID No" model="solo_parent_id" name="solo_parent_id" :required="false" placeholder="Enter your ID Number" disabled/>
        </div>
    </x-forms.question-group>
</x-forms.question-card>
