<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Password (OTP) Verification</title>
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

        .otp-code {
            font-size: 24px;
            font-weight: bold;
            color: #2e7d32;
            background: #f1f8e9;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            margin: 20px 0;
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
    </style>
</head>

<body>
    <div class="header">
        <h2>One-Time Password (OTP) Verification</h2>
    </div>

    <p>Hello {{ $user->first_name }},</p>

    <p>You have requested to verify your login. Please use the following OTP code to proceed:</p>

    <div class="otp-code">
        {{ $otp }}
    </div>

    <p>This OTP is valid for **{{ $expiration }} minutes**. If you did not request this, please ignore this email.</p>

    <a href="{{ url(route('otp.verify')) }}" class="button">Verify OTP</a>

    <p>If you have any issues, please contact our support team at <a href="#">support@company.com</a>.</p>

    <div class="footer">
        <p>Best regards,<br>
            The Security Team</p>
        <p>© {{ date('Y') }} E-PDS. All rights reserved.</p>
        <p><small>This is an automated message. Please do not reply directly to this email.</small></p>
    </div>
</body>

</html>
