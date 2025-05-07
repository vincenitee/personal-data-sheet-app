<!-- resources/views/reports/training-category.blade.php -->
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

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
            text-transform: uppercase;
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
        <p><strong>Total Trainings:</strong> {{ $trainings->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                @foreach ($columns as $key => $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($trainings as $training)
                <tr>
                    @foreach ($columns as $key => $label)
                        <td >
                            @switch($key)
                                @case ('employee')
                                    @php
                                        if ($training->entry && $training->entry->personalInformation) {
                                            $personalInformation = $training->entry->personalInformation;
                                            $fullName =
                                                $personalInformation->first_name .
                                                ($personalInformation->middle_name
                                                    ? ' ' . $personalInformation->middle_name
                                                    : '') .
                                                ' ' .
                                                $personalInformation->last_name;
                                        } else {
                                            $fullName = 'No personal information available';
                                        }
                                    @endphp

                                    {{ $fullName }}
                                @break

                                @case('type')
                                    {{ Str::title(str_replace('_', ' ', $training['type'])) }}
                                @break

                                @case('date_from')
                                    {{ $training['date_from'] ? \Carbon\Carbon::parse($training['date_from'])->format('M d, Y') : 'N/A' }}
                                @break

                                @case('date_to')
                                    {{ $training['date_to'] ? \Carbon\Carbon::parse($training['date_to'])->format('M d, Y') : 'N/A' }}
                                @break

                                @default
                                    {{ $training[$key] ?? 'N/A' }}
                            @endswitch
                        </td>
                    @endforeach
                </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" style="text-align: center; padding: 20px;">
                            No trainings found in this category
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
