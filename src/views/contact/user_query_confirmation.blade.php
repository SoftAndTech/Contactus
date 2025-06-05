<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Query Confirmation</title>
</head>
<body style="margin: 0; padding: 0;">
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; padding: 30px; border-radius: 8px;">
        <h2 style="color: #2d3748; margin-bottom: 25px;">Hi {{ $contactData['avsrContct_u_name'] }},</h2>
        <br>
        <p style="margin-top: 1rem;">Thank you for contacting us. We've received your query and will get back to you shortly.</p>

        <div style="margin-bottom: 25px;">
                <h3 style="color: #4a5568;">Message</h3>
                <div style="background-color: white; padding: 15px; border-left: 3px solid #4299e1;">
                    <p>{{ $contactData['avsrContct_u_msg'] }}</p>
                </div>
        </div>
        <p>We appreciate your patience.</p>
        <br>
        <p>Best Regards,<br>Support Team</p>
        </div>

        <div style="margin-top: 30px; text-align: center; font-size: 12px; color: #718096;">
            <p>This email was sent from the contact form on {{ config('app.name') }}</p>
            <p>{{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html>
