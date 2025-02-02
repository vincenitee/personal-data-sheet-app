@props(['name', 'question' => null,])

<div class="row g-2">

    {{-- Questions --}}
    @if($question)
        <div class="col-6">
            {{ $question }}
        </div>
    @endif

    {{-- Radio Buttons --}}
    <div class="col-6">
        <x-forms.yes-no-radio :model="$name" :name="$name" />
    </div>

    {{-- For additional fields --}}
    {{ $slot }}

</div>
