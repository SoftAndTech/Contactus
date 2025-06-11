<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Query Received</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 30px;">
    <div style="background: #ffffff; padding: 20px; border-radius: 6px; max-width: 600px; margin: auto;">
        <h2 style="color: #333;">Hello {{ $name ?? 'User' }},</h2>
        <p>Thank you for contacting us. We’ve received your query and will get back to you shortly.</p>

        <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">

        <p><strong>Your Message:</strong></p>
        <blockquote style="background: #f9f9f9; padding: 15px; border-left: 4px solid #007bff;">
            {{ $message ?? 'N/A' }}
        </blockquote>

        <p>Best Regards,<br>Support Team</p>
    </div>
</body>
</html>
