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
        .breakdown {
            margin-bottom: 20px;
        }
        .breakdown h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }
        .breakdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .breakdown li {
            font-size: 11px;
            padding: 2px 0;
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

    <!-- Department Breakdown Section -->
    <div class="breakdown">
        <h3>Department Breakdown</h3>
        <table style="width: 100%; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background-color: #f2f2f2;">Department</th>
                    <th style="background-color: #f2f2f2;">No. of Employees</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users->groupBy(fn($user) => $user->department ?? 'none') as $department => $group)
                    <tr>
                        <td>
                            <strong>
                                {{ $department === 'none' ? 'No assigned department' : \App\Enums\MunicipalOffice::getValue($department) }}
                            </strong>
                        </td>
                        <td>{{ $group->count() }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td>
                        <strong>Total Employees:</strong>
                    </td>
                    <td>{{ $users->count() }}</td>
                </tr>
            </tbody>
        </table>
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
            @forelse($users as $user)
                <tr>
                    @foreach($columns as $key => $label)
                        <td>
                            @switch($key)
                                @case('name')
                                    {{ $user->first_name }}
                                    {{ $user->middle_name ? $user->middle_name : ' ' }}
                                    {{ $user->last_name }}
                                    @break

                                @case('sex')
                                    {{ $user->sex ? ucwords($user->sex)  : 'N/A' }}
                                    @break

                                @case('birth_date')
                                    {{ $user->birth_date ? date('M d, Y', strtotime($user->birth_date)) : 'N/A' }}
                                    @break

                                @case('email')
                                    {{ $user->email }}
                                    @break

                                @case('department')
                                    {{ $user->department ? \App\Enums\MunicipalOffice::getValue($user->department) : 'No assigned department yet' }}
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
                        No approved employees found
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
