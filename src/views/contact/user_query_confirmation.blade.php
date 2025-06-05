<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Query Confirmation</title>
</head>
<body>
    <h2>Hi {{ $contactData['name'] }},</h2>
    <p>Thank you for contacting us. We’ve received your query and will get back to you shortly.</p>

    <p><strong>Your Query:</strong></p>
    <p>{{ $contactData['message'] }}</p>

    <p>We appreciate your patience.</p>
    <br>
    <p>Best Regards,<br>Support Team</p>
</body>
</html>
