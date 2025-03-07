<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Update</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
            font-size: 14px;
            color: #666666;
        }
        .status-approved {
            color: #2e7d32;
            font-weight: bold;
        }
        .status-rejected {
            color: #c62828;
            font-weight: bold;
        }
        .button {
            display: inline-block;
            background-color: #4a6ee0;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            margin: 15px 0;
            font-weight: 500;
        }
        .help-text {
            background-color: #f9f9f9;
            border-left: 4px solid #ddd;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Account Status Update</h2>
    </div>

    <p>Hello {{ $user->first_name }},</p>

    <p>We're writing to inform you that your account request has been
    @if($status === 'approved')
        <span class="status-approved">approved</span>.
    @else
        <span class="status-rejected">{{ strtolower($status) }}</span>.
    @endif
    </p>

    @if($status === 'approved')
        <p>Great news! Your account has been successfully activated and you now have access to our system.</p>

        <a href="{{ url(route('login')) }}" class="button">Log In Now</a>

        {{-- <p>If you have any questions about using the system, please refer to our <a href="#">help documentation</a> or contact our support team.</p> --}}
    @else
        <div class="help-text">
            <p>We apologize for any inconvenience this may cause. If you believe this decision was made in error or if you'd like to provide additional information to support your application, please contact us.</p>

            <p>Our HR team can be reached at <a href="#">hr@company.com</a> or by phone at (555) 123-4567 during business hours.</p>
        </div>
    @endif

    <p>Thank you for your interest in our organization.</p>

    <div class="footer">
        <p>Best regards,<br>
        The HR Team</p>
        <p>© {{ date('Y') }} E-PDS. All rights reserved.</p>
        <p><small>This is an automated message. Please do not reply directly to this email.</small></p>
    </div>
</body>
</html>
