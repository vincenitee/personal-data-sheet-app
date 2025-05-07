<!-- resources/views/reports/entries-report.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 11px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 18px;
        }
        .meta-info {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 9px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Generated on: {{ $generatedDate }}</p>
    </div>

    <div class="meta-info">
        <p><strong>Total Entries:</strong> {{ $entries->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                @foreach($columns as $key => $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($entries as $entry)
                <tr>
                    @foreach($columns as $key => $label)
                        <td>
                            @switch($key)
                                @case('name')
                                    {{ $entry->personalInformation->first_name }}
                                    {{ $entry->personalInformation->middle_name }}
                                    {{ $entry->personalInformation->last_name }}
                                    @break

                                @case('position')
                                    {{ optional($entry->workExperiences->sortByDesc('date_to'))->first()?->position ?? 'N/A' }}
                                    @break

                                @case('office')
                                    {{ \App\Enums\MunicipalOffice::getValue($entry->user->department) }}
                                    @break

                                @case('education')
                                    @php
                                        $educationPriority = [
                                            'graduates_studies' => 5,
                                            'college' => 4,
                                            'vocational' => 3,
                                            'secondary' => 2,
                                            'elementary' => 1,
                                        ];

                                        $highestEducationalAttainment =
                                            $entry->educationalBackgrounds
                                                ->sortByDesc(
                                                    fn($edu) => [
                                                        $educationPriority[$edu->level] ?? 0,
                                                        $edu->attendance_to ?? PHP_INT_MAX,
                                                    ],
                                                )
                                                ->first()?->level ?? 'Unknown';
                                    @endphp
                                    {{ Str::title(str_replace('_', ' ', $highestEducationalAttainment)) }}
                                    @break

                                @case('employment_status')
                                    @php
                                        $currentWork = optional(
                                            $entry->workExperiences->sortByDesc('date_to'),
                                        )->first();
                                        $workType = $currentWork?->status;
                                    @endphp
                                    {{ Str::title(str_replace('_', ' ', $workType)) | str_replace(' Of ', ' of ', Str::title(str_replace('_', ' ', $workType))) }}
                                    @break

                                @case('years_experience')
                                    @php
                                        $totalDuration = $entry->workExperiences->reduce(function (
                                            $carry,
                                            $work,
                                        ) {
                                            $start = \Carbon\Carbon::parse($work->date_from);
                                            $end = $work->date_to
                                                ? \Carbon\Carbon::parse($work->date_to)
                                                : now();

                                            return $carry->add($start->diff($end));
                                        }, \Carbon\CarbonInterval::years(0));

                                        $years = $totalDuration->y;
                                        $months = $totalDuration->m;

                                        $yearsInService = "{$years} years, {$months} months";
                                    @endphp
                                    {{ $yearsInService }}
                                    @break

                                @case('eligibility')
                                    @php
                                        $currentEligibility = $entry->eligibilities->sortByDesc(
                                            fn($eligibility) => $eligibility->exam_date ?? now(),
                                        );
                                    @endphp
                                    {{ $currentEligibility->first()->career_service ?? 'N/A' }}
                                    @break

                                @case('age')
                                    @php
                                        $birthDate = \Carbon\Carbon::parse($entry->personalInformation->birth_date);
                                        $age = $birthDate->age;
                                    @endphp
                                    {{ $age }} years old
                                    @break

                                @case('email')
                                    {{ $entry?->personalInformation?->email ?? 'N/A' }}
                                    @break

                                @case('mobile_no')
                                    {{ $entry?->personalInformation?->mobile_no ?? 'N/A' }}
                                    @break

                                @default
                                    N/A
                            @endswitch
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" style="text-align: center; padding: 20px;">
                        No approved entries found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>This report contains confidential information. Do not distribute without authorization.</p>
    </div>
</body>
</html>
