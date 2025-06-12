<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Query Received</title>
</head>
    <body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 30px;"> 
         @php 
            use SoftAndTech\Contactus\Helper\ContactusHelper; 
            $contactusSettings = \SoftAndTech\Contactus\Helper\ContactusHelper::getAll();
                $iconPath = ContactusHelper::get('icon');
                $iconUrl = $iconPath ? asset($iconPath) : null;
        @endphp
        <div style="font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;max-width:600px;margin:0 auto;padding:10px">
            <div style="background-color:#f8f9fa;padding:30px;border-radius:8px">
                <div class="admin-icon-preview d-flex align-items-center" style="text-align:center;margin-bottom:20px;"> 
                    @if($iconPath)
                        <img src="{{ $iconUrl }}"  style="background: #f2f2f2; max-height:60px;border: 1px solid gray;padding: 2px;font-size: 12px;" alt="Website Icon">
                    @endif 
                    <h3 class="admin-title-preview" style="text-align:center;color:#181f25;margin-left:20px; font-w">
                        {{ ContactusHelper::get('website_title') ?? 'Website Title' }}
                    </h3>
                </div> 
                <hr>
                <h2 style="color:#2d3748;margin-bottom:25px">Hello {{ $name ?? 'User' }},</h2>
                <br>
                <p style="margin-top:1rem" class="ack_msg user-ack-msg-preview">Thank you for contacting us. We've received your query and will get back to you shortly.</p>

                <div style="margin-bottom:25px">
                    <h5 style="color:#4a5568">Message</h5>
                    <div style="background-color:white;padding:15px;border-left:3px solid #4299e1">
                        <p> <blockquote style="background: #f9f9f9; padding: 15px; border-left: 4px solid #007bff;">
                            {!! nl2br(e($userMessage ?? 'N/A')) !!}
                        </blockquote></p>
                    </div>
                </div>
                <p>We appreciate your patience.</p>
                <br>
                <p class="user-sender-preview">Best Regards,<br>Support Team</p>
            <hr>
                <div style="margin-top:30px;text-align:center;font-size:12px;color:#718096">
                    <p>This email was sent from the contact form on Laravel</p>
                    <p class="admin-footer-meta-preview" >
                        <a href="{{ ContactusHelper::get('website_url') }}" style="text-decoration: none; color: #2563eb;">
                        <strong class="user-title-footer">{{ ContactusHelper::get('website_title') }}</strong> </a> | <span class="s_mail muted">{{ ContactusHelper::get('send_email_to') }}</span>
                    </p>
                    <p class="admin-footer-date-preview">{{ now()->format('F j, Y \a\t g:i A') }}</p> 
                </div>
            </div> 
        </div>
    </body>
    <!-- Bootstrap JS (Optional, for Bootstrap features like dropdowns, modals, etc.) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
