{{-- Elementary --}}
<x-card title="Elementary Education" icon="bi-book-fill">
    @include('partials.form-fields', [
        'modelPrefix' => 'education.elementary',
        'fields' => [
            [
                'label' => 'School Name',
                'placeholder' => 'Enter elementary school name',
                'icon' => 'bi-building-fill',
            ],
            [
                'label' => 'Degree Earned ',
                'placeholder' => 'e.g., Basic Education',
            ],
            [
                'label' => 'Attendance From',
                'type' => 'date',
            ],
            [
                'label' => 'Attendance To',
                'type' => 'date',
            ],
            [
                'label' => 'Level Unit Earned',
                'type' => 'number',
                'placeholder' => 'e.g., 6 (enter the last completed level if not graduated)',
            ],
            [
                'label' => 'Year Graduated',
                'type' => 'number',
                'placeholder' => 'e.g., 2016',
            ],
            [
                'label' => 'Academic Honors',
                'placeholder' => 'e.g., Valedictorian, With Honors',
            ],
        ],
    ])
</x-card>

{{-- Secondary --}}
<x-card title="Secondary Education" icon="bi-journal-text">
    @include('partials.form-fields', [
        'modelPrefix' => 'education.secondary',
        'fields' => [
            [
                'label' => 'School Name',
                'placeholder' => 'Enter high school name',
                'icon' => 'bi-building-fill',
            ],
            [
                'label' => 'Degree Earned ',
                'placeholder' => 'e.g., Junior High School',
            ],
            [
                'label' => 'Attendance From',
                'type' => 'date',
            ],
            [
                'label' => 'Attendance To',
                'type' => 'date',
            ],
            [
                'label' => 'Level Unit Earned',
                'type' => 'number',
                'placeholder' => 'e.g., 12 (enter the last completed level if not graduated)',
            ],
            [
                'label' => 'Year Graduated',
                'type' => 'number',
                'placeholder' => 'e.g., 2016',
            ],
            [
                'label' => 'Academic Honors',
                'placeholder' => 'e.g., Valedictorian, With Honors',
            ],
        ],
    ])
</x-card>

{{-- Vocational --}}

<!-- Vocational Level -->
<x-card title="Vocational/Trade Course" icon="bi-tools" loadingTarget="addEducationEntry('vocational')">
    @foreach ($education['vocational'] as $index => $entry)

        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "education.vocational.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter vocational school name',
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Automotive Servicing NC II',
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'date',
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'date',
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'e.g., 2020',
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., TESDA Scholar, With Distinction',
                ],
            ],
        ])


        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('vocational', {{ $index }})"
                class="btn btn-outline-danger btn-sm" @if (count($education['vocational']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('vocational')" class="btn btn-outline-danger btn-sm"
                @if (count($education['vocational']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('vocational')" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot
</x-card>

{{-- College --}}
<x-card title="College" icon="bi-mortarboard-fill" loadingTarget="addEducationEntry('college')">
    @foreach ($education['college'] as $index => $entry)

        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "education.college.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter college or university name',
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Bachelor of Science in Computer Science',
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'date',
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'date',
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                    'placeholder' => 'e.g., 120 (enter the total units completed if not graduated)',
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'e.g., 2023',
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., Cum Laude, Dean\'s Lister',
                ],
            ],
        ])


        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('college', {{ $index }})"
                class="btn btn-outline-danger btn-sm" @if (count($education['college']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('college')" class="btn btn-outline-danger btn-sm"
                @if (count($education['college']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('college')" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot
</x-card>

{{-- Graduate Studies --}}
<x-card title="Graduate Studies" icon="bi-award" loadingTarget="addEducationEntry('graduate_studies')">
    @foreach ($education['graduate_studies'] as $index => $entry)

        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "education.graduate_studies.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter graduate school or university name',
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Master of Business Administration (MBA)',
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'date',
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'date',
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                    'placeholder' => 'e.g., 36 credit units (enter the total units completed if not graduated)',
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'e.g., 2025',
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., With Distinction, Best Thesis Award',
                ],
            ],
        ])

        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('graduate_studies', {{ $index }})"
                class="btn btn-outline-danger btn-sm" @if (count($education['graduate_studies']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('graduate_studies')"
                class="btn btn-outline-danger btn-sm" @if (count($education['graduate_studies']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('graduate_studies')" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot
</x-card>
