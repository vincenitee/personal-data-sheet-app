<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Status Update</title>
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
        .status-returned {
            color: #e65100;
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
        .revision-details {
            background-color: #fff8e1;
            border-left: 4px solid #ffd54f;
            padding: 15px;
            margin: 20px 0;
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
        <h2>Entry Status Update</h2>
    </div>

    <p>Hello {{ $user->first_name }},</p>

    <p>We're writing to inform you that your recent entry has been
    @if($status === 'approved')
        <span class="status-approved">approved</span>.
    @else
        <span class="status-returned">returned for revisions</span>.
    @endif
    </p>

    @if($status === 'approved')
        <p>Congratulations! Your entry has been successfully approved and has been added to our system.</p>

        <a class="button">View Your Entry</a>

        <div class="help-text">
            <p>Your entry will now be visible to all relevant departments and will be included in any applicable reports or processes.</p>
        </div>
    @else
        <div class="revision-details">
            <h3>Revision Details:</h3>
            <p>{{ $revision_comments }}</p>

            @if(!empty($revision_items))
                <ul>
                    @foreach($revision_items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <p>Please make the necessary corrections and resubmit your entry as soon as possible.</p>

        <a class="button">Edit Your Entry</a>

        <div class="help-text">
            <p>If you have any questions about the requested revisions or need assistance, please contact your department supervisor or the support team at <a href="mailto:support@company.com">support@company.com</a>.</p>
        </div>
    @endif

    <p>Thank you for your contribution to our system.</p>

    <div class="footer">
        <p>Best regards,<br>
        The Management Team</p>
        <p>© {{ date('Y') }} Company Name. All rights reserved.</p>
        <p><small>This is an automated message. Please do not reply directly to this email.</small></p>
    </div>
</body>
</html>
