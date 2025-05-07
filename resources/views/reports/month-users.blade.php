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
        .month-group {
            margin-top: 30px;
        }
        .month-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
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
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
        }
        .table-footer {
            text-align: right;
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Generated on: {{ $generatedDate }}</p>
    </div>

    @php
        $groupedUsers = $users->groupBy(function ($user) {
            return \Carbon\Carbon::parse($user->created_at)->format('F Y');
        });
    @endphp

    @forelse ($groupedUsers as $month => $employees)
        <div class="month-group">
            <div class="month-title">{{ $month }}</div>
            <table>
                <thead>
                    <tr>
                        @foreach($columns as $key => $label)
                            <th>{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $user)
                        <tr>
                            @foreach($columns as $key => $label)
                                <td>
                                    @switch($key)
                                        @case('name')
                                            {{ $user->first_name }}
                                            {{ $user->middle_name ?? ' ' }}
                                            {{ $user->last_name }}
                                            @break

                                        @case('sex')
                                            {{ $user->sex ? ucwords($user->sex) : 'N/A' }}
                                            @break

                                        @case('birth_date')
                                            {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('M d, Y') : 'N/A' }}
                                            @break

                                        @case('email')
                                            {{ $user->email }}
                                            @break

                                        @case('department')
                                            {{ $user->department ? \App\Enums\MunicipalOffice::getValue($user->department) : 'Not Assigned' }}
                                            @break

                                        @case('created_at')
                                            {{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('M d, Y') : 'N/A' }}
                                            @break

                                        @default
                                            {{ $user->$key ?? 'N/A' }}
                                    @endswitch
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="{{ count($columns) }}" class="table-footer">
                            Total Employees in {{ $month }}: {{ $employees->count() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @empty
        <p style="text-align: center; padding: 20px;">
            No employees found.
        </p>
    @endforelse

    <div class="footer">
        <p><strong>Grand Total Employees:</strong> {{ $users->count() }}</p>
        <p>This report contains confidential information. Do not distribute without authorization.</p>
    </div>
</body>
</html>
