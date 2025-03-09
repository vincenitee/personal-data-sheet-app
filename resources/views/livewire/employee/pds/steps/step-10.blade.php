{{-- Passport --}}
<x-card title="Passport" icon="bi-airplane">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Passport Photo',
                'type' => 'file',
            ],
        ],
    ])

    @include('partials.file-preview', [
        'file' => $passport_photo ?? null,
        'wireTarget' => 'passport_photo',
    ])
</x-card>


{{-- Right Thumbmark --}}
<x-card title="Right Thumbmark" icon="bi-fingerprint">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Right Thumbmark Photo',
                'type' => 'file',
            ],
        ],
    ])

    @include('partials.file-preview', [
        'file' => $right_thumbmark_photo ?? null,
        'wireTarget' => 'right_thumbmark_photo',
    ])
</x-card>

{{-- Government Issued ID --}}
<x-card title="Government Issued ID" icon="bi-building">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Government ID Type',
                'type' => 'select',
                'options' => $governmentIdOptions
            ],
            [
                'label' => 'Government ID No',
                'type' => 'number',
            ],
            [
                'label' => 'Date of Issuance',
                'type' => 'date'
            ],
            [
                'label' => 'Government ID Photo',
                'type' => 'file'
            ],
        ]
    ])

    @include('partials.file-preview', [
        'file' => $government_id_photo ?? null,
        'title' => 'Uploaded Government ID Photo',
        'wireTarget' => 'government_id_photo',
    ])
</x-card>

{{-- Signature --}}
<x-card title="Signature" icon="bi-pen">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Signature Photo',
                'type' => 'file'
            ],
        ]
    ])

    @include('partials.file-preview', [
        'file' => $signature_photo ?? null,
        'title' => 'Uploaded Signature Photo',
        'wireTarget' => 'signature_photo',
    ])
</x-card>

{{-- OTR --}}
<x-card title="OTR" icon="bi-file-earmark">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'OTR Photo',
                'type' => 'file'
            ],
        ]
    ])

    @include('partials.file-preview', [
        'file' => $otr_photo ?? null,
        'title' => 'Uploaded OTR Photo',
        'wireTarget' => 'otr_photo',
    ])
</x-card>

{{-- Diploma --}}
<x-card title="Diploma" icon="bi-mortarboard">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Diploma Photo',
                'type' => 'file',
                'required' => false,
            ],
        ]
    ])

    @include('partials.file-preview', [
        'file' => $diploma_photo ?? null,
        'title' => 'Uploaded Diploma Photo',
        'wireTarget' => 'diploma_photo',
    ])
</x-card>

{{-- Employement Certificate --}}
<x-card title="Employement Certificate" icon="bi-file-earmark-text">
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Employement Certificate',
                'type' => 'file',
                'required' => false,
            ],
        ]
    ])

    @include('partials.file-preview', [
        'file' => $employement_certificate ?? null,
        'title' => 'Uploaded Employement Certificate',
        'wireTarget' => 'employement_certificate',
    ])
</x-card>
