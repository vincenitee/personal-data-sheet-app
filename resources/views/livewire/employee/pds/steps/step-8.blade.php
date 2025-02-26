{{-- Entry Container --}}
<div class="d-flex flex-column gap-3">
    <x-card title="Skills" icon="bi-lightbulb" loadingTarget="addSkillEntry()">
        @foreach ($skills as $index => $entry)
            @include('partials.count-indicator', ['count' => $index])

            @include('partials.form-fields', [
                'modelPrefix' => "skills.$index",
                'fields' => [
                    [
                        'label' => 'Skill',
                        'required' => 'false',
                    ],
                ],
            ])

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('skills', {{ $index }})"
                    class="btn btn-outline-danger btn-sm" @if (count($skills) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        @endforeach

        @slot('footer')
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllSkillEntry()" class="btn btn-outline-danger btn-sm"
                    @if (count($skills) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addSkillEntry()" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Add Another Entry
                </button>
            </div>
        @endslot
    </x-card>

    <x-card title="Non-Academic Recognitions" icon="bi-patch-check" loadingTarget="addRecognitionEntry()">
        @foreach ($recognitions as $index => $entry)
            @include('partials.count-indicator', ['count' => $index])

            @include('partials.form-fields', [
                'modelPrefix' => "recognitions.$index",
                'fields' => [
                    [
                        'label' => 'Recognition',
                        'required' => 'false',
                    ],
                ],
            ])

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('recognitions', {{ $index }})"
                    class="btn btn-outline-danger btn-sm" @if (count($recognitions) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        @endforeach

        @slot('footer')
            <div class="d-flex justify-content-between align-items-center">
                <button
                    type="button" wire:click="removeAllRecognitionEntry()" class="btn btn-outline-danger btn-sm"
                    @if (count($recognitions) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addRecognitionEntry()" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Add Another Entry
                </button>
            </div>
        @endslot
    </x-card>

    <x-card title="Organizations" icon="bi-building" loadingTarget="addOrganizationEntry()">
        @foreach ($organizations as $index => $entry)
            @include('partials.count-indicator', ['count' => $index])

            @include('partials.form-fields', [
                'modelPrefix' => "organizations.$index",
                'fields' => [
                    [
                        'label' => 'Organization',
                        'required' => 'false',
                    ],
                ],
            ])

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('organizations', {{ $index }})"
                    class="btn btn-outline-danger btn-sm" @if (count($organizations) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        @endforeach

        @slot('footer')
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllOrganizationEntry()" class="btn btn-outline-danger btn-sm"
                    @if (count($organizations) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addOrganizationEntry()" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Add Another Entry
                </button>
            </div>
        @endslot

    </x-card>
</div>

@push('scripts')
    <script>
        console.log('i am added everytime i am loaded')
        function confirmDelete(type, index){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    Livewire.dispatch('removeEntry', {type: type, index: index})
                }
            });
        }
    </script>
@endpush
{{-- 
@script
    <script>
        $wire.on('show-alert', (data) => {
            Swal.fire(data[0])
        })
    </script>
@endscript --}}
