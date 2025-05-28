<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="margin: 0; padding: 0;">
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <div style="background-color: #f8f9fa; padding: 30px; border-radius: 8px;">
            <h2 style="color: #2d3748; margin-bottom: 25px;">You've received a new message</h2>
            
            <div style="margin-bottom: 20px;">
                <h3 style="color: #4a5568;">Contact Details</h3>
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                @isset($phone)
                <p><strong>Phone:</strong> {{ $phone }}</p>
                @endisset
            </div>
            
            <div style="margin-bottom: 25px;">
                <h3 style="color: #4a5568;">Message</h3>
                <div style="background-color: white; padding: 15px; border-left: 3px solid #4299e1;">
                    {{ $message }}
                </div>
            </div>

            <div style="text-align: center;">
                <a href="mailto:{{ $email }}" style="background-color: #2563eb; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;">
                    Reply to {{ $name }}
                </a>
            </div>
        </div>

        <div style="margin-top: 30px; text-align: center; font-size: 12px; color: #718096;">
            <p>This email was sent from the contact form on {{ config('app.name') }}</p>
            <p>{{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html>
