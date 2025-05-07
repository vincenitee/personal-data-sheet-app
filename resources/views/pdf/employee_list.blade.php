<!-- resources/views/reports/entries-report.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        :root {
            --primary-color: #0f4c81;
            --accent-color: #c8102e;
            --text-color: #333;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: var(--text-color);
            line-height: 1.5;
            background-color: white;
            margin: 0;
            padding: 0;
            font-size: 11px;
        }

        .header {
            padding: 1.5rem 0 1rem;
            border-bottom: 3px solid var(--primary-color);
            margin-bottom: 2rem;
        }

        .header-content {
            text-align: center;
        }

        .location {
            font-size: 0.85rem;
            color: #555;
            margin: 0;
        }

        .municipality {
            font-size: 1.6rem;
            color: var(--primary-color);
            margin: 0.3rem 0 0;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .page-title {
            color: var(--primary-color);
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            padding-bottom: 0.5rem;
            font-size: 18px;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .generated-date {
            text-align: center;
            margin-bottom: 15px;
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
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 9px;
            color: #666;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            th {
                background-color: var(--primary-color) !important;
                color: white !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <p class="location">Republic of the Philippines</p>
                <p class="location">Province of La Union</p>
                <h1 class="municipality">Municipality of Rosario</h1>
            </div>
        </div>

        <h2 class="page-title">{{ $title }}</h2>

        <p class="generated-date">Generated on: {{ $generatedDate }}</p>

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

                                    @case('trainings')
                                        @php
                                            $trainingCount = count($entry->trainings);
                                        @endphp
                                        {{ $trainingCount }}
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
    </div>
</body>
</html>