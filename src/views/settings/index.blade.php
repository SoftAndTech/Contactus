
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Settings</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @php 
        use SoftAndTech\Contactus\Helper\ContactusHelper; 
        $iconPath = ContactusHelper::get('icon');
    @endphp
    <div class="container-fluid my-4 mx-auto py-2 px-4">
        <div class="row">
            <div class="col-md-4">
                {{-- Form Section --}}
                <div class="form-panel card p-4">
                    <h2>Contact Us Configuration</h2> 
                    
                    <form method="POST" action="{{ route('contactus.settings.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email to receive contact messages</label>
                                    <input type="email" name="send_email_to" value="{{ old('send_email_to', ContactusHelper::get('send_email_to') ?? '') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label>Sender Name</label>
                                    <input type="text" name="sender_name" value="{{ old('sender_name', ContactusHelper::get('sender_name') ?? '') }}" class="form-control">
                                </div>
                            </div>
                            
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Admin Message</label>
                                    <textarea name="admin_message" class="form-control">{{ old('admin_message', ContactusHelper::get('admin_message') ?? 'You have a maeeage from ') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>User Acknoledgement Message</label> 
                                    <textarea name="user_ack_message" class="form-control">{{ old('user_ack_message', ContactusHelper::get('user_ack_message') ?? 'Thank you for contacting us. Weve received your query and will get back to you shortly. ') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h4>Website Info</h4> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website Title</label>
                                    <input type="text" name="website_title" value="{{ old('website_title', ContactusHelper::get('website_title') ?? '') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website Link</label>
                                    <input type="text" name="website_link" value="{{ old('website_link', ContactusHelper::get('website_link') ?? '') }}" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Choose Icon</label>
                                    <input type="file" name="icon" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <hr>
                        
                        <h4>Optional Settings</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group position-relative">
                                    <label>
                                        Display contact field in Mail Template
                                        <span class="help-icon" tabindex="0" data-help="Show or hide the user's contact number in the admin email template.">
                                            <i class="fa fa-question-circle text-info"></i>
                                        </span>
                                    </label>
                                    <select name="contact_number" class="form-control">
                                        <option value="yes" {{ (old('contact_number', ContactusHelper::get('contact_number') ?? '') === 'yes') ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ (old('contact_number', ContactusHelper::get('contact_number') ?? '') === 'no') ? 'selected' : '' }}>No</option>
                                    </select> 
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>
                                            Display Title in Mail Templates
                                            <span class="help-icon" tabindex="0" data-help="Show or hide the website title in both admin and user email templates.">
                                                <i class="fa fa-question-circle text-info"></i>
                                            </span>
                                        </label>
                                        <select name="display_title" class="form-control">
                                            <option value="yes" {{ (old('display_title', ContactusHelper::get('display_title') ?? '') === 'yes') ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ (old('display_title', ContactusHelper::get('display_title') ?? '') === 'no') ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>
                                            Display Icon in Mail Template
                                            <span class="help-icon" tabindex="0" data-help="Show or hide the website icon/logo in the email templates.">
                                                <i class="fa fa-question-circle text-info"></i>
                                            </span>
                                        </label>
                                        <select name="display_icon" class="form-control">
                                            <option value="yes" {{ (old('display_icon', ContactusHelper::get('display_icon') ?? '') === 'yes') ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ (old('display_icon', ContactusHelper::get('display_icon') ?? '') === 'no') ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                <style>
                                    .help-popup {
                                        position: absolute;
                                        left: 110%;
                                        top: 0;
                                        z-index: 1000;
                                        min-width: 220px;
                                        background: #fff;
                                        border: 1px solid #b6d4fe;
                                        border-radius: 6px;
                                        box-shadow: 0 2px 8px #0001;
                                        padding: 10px 14px;
                                        font-size: 0.95em;
                                        color: #222;
                                        display: none;
                                        transition: opacity 0.2s;
                                    }
                                    .help-icon {
                                        cursor: pointer;
                                        margin-left: 6px;
                                        outline: none;
                                    }
                                    .help-icon:focus i,
                                    .help-icon:hover i {
                                        color: #0d6efd;
                                    }
                                </style>
                                <script>
                                    $(function() {
                                        // Remove any existing popups on click elsewhere
                                        $(document).on('click', function(e) {
                                            if (!$(e.target).closest('.help-icon, .help-popup').length) {
                                                $('.help-popup').fadeOut(100, function() { $(this).remove(); });
                                            }
                                        });

                                        // Show popup on icon click or focus
                                        $(document).on('click focus', '.help-icon', function(e) {
                                            e.stopPropagation();
                                            $('.help-popup').remove(); // Remove any existing
                                            var $icon = $(this);
                                            var msg = $icon.data('help');
                                            var $popup = $('<div class="help-popup"></div>').text(msg);

                                            // Position beside the icon
                                            $icon.after($popup);
                                            $popup.fadeIn(100);

                                            // Adjust position if overflowing right edge
                                            var rect = $popup[0].getBoundingClientRect();
                                            if (rect.right > window.innerWidth) {
                                                $popup.css({left: 'auto', right: '110%'});
                                            }
                                        });

                                        // Hide popup on blur (keyboard navigation)
                                        $(document).on('blur', '.help-icon', function() {
                                            setTimeout(function() {
                                                $('.help-popup').fadeOut(100, function() { $(this).remove(); });
                                            }, 100);
                                        });
                                    });
                                </script>
                        </div> 
                        <hr>  

                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-secondary position-relative" id="settings-submit-btn" style="transition: background 0.3s;">
                                Update Settings
                                @if(session('success'))
                                    <span class="ml-2 badge badge-success" id="settings-btn-msg">{{ session('success') }}</span>
                                @elseif(session('error'))
                                    <span class="ml-2 badge badge-danger" id="settings-btn-msg">{{ session('error') }}</span>
                                @endif
                            </button>
                        </div>

                        <script>
                            $(function() {
                                // If message exists, change button background
                                @if(session('success'))
                                    $('#settings-submit-btn').css('background', '#28a745');
                                @elseif(session('error'))
                                    $('#settings-submit-btn').css('background', '#dc3545');
                                @endif

                                // Auto-hide message and restore button color
                                setTimeout(function() {
                                    $('#settings-btn-msg').fadeOut(400, function() {
                                        $('#settings-submit-btn').css('background', '');
                                    });
                                }, 5000);
                            });
                        </script>
                    </form>
                </div> 
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-user-shield"></i> Admin Mail Template Preview
                    </div>
                    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 600px; margin: 0 auto; padding: 10px;">
                        <div style="background-color: #f8f9fa; padding: 30px; border-radius: 8px;">
                            <div class="admin-icon-preview" style="text-align:center;margin-bottom:20px;"> 
                                @if(!empty(ContactusHelper::get('icon')))
                                
                                    <img src="{{ $iconPath ?? '' }}" alt="Website Icon" style="max-width:60px;max-height:60px;">

                                @else
                                    <img src="" alt="Website Icon" style="max-width:60px;max-height:60px;">
                                @endif
                            </div> 
                            <h3 class="admin-title-preview" style="text-align:center;color:#181f25;margin-bottom:20px;">
                                website title
                            </h3>
                            <hr>
                            <h2 class="admin-message-preview" style="color: #2d3748; margin-bottom: 25px;">You've received a new message</h2>
                            
                            <div style="margin-bottom: 20px;">
                                <h5 style="color: #4a5568;">Contact Details</h5>
                                <p class="admin-name-preview"><strong>Name:</strong> John Piper</p>
                                <p class="admin-email-preview"><strong>Email:</strong> user@mail.com</p>
                                @isset($phone)
                                <p class="admin-phone-preview"><strong>Phone:</strong> +91-9874587634</p>
                                @endisset
                            </div>
                            
                            <div style="margin-bottom: 25px;">
                                <h5 style="color: #4a5568;">Message</h5>
                                <div class="admin-user-message-preview" style="background-color: white; padding: 15px; border-left: 3px solid #4299e1;">
                                    I want to know more about your services. Please provide me with the details.
                                </div>
                            </div>

                            <div style="text-align: center;">
                                <a href="" class="admin-reply-link-preview" style="background-color: #2563eb; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;">
                                    Reply to John Piper
                                </a>
                            </div>
                       
                            <hr>
                            <div style="margin-top: 30px; text-align: center; font-size: 12px; color: #718096;">
                                <p class="admin-footer-appname-preview">This email was sent from the contact form on {{ config('app.name') }}</p>
                                <p class="admin-footer-meta-preview" >
                                <strong class="user-title-footer">{{ ContactusHelper::get('website_title') }}</strong> | <span class="s_mail muted">{{ ContactusHelper::get('send_email_to') }}</span>
                                </p>
                                <p class="admin-footer-date-preview">{{ now()->format('F j, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <i class="fa fa-user"></i> User Mail Template Preview
                            </div>
                            <div style="font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;max-width:600px;margin:0 auto;padding:10px">
                                <div style="background-color:#f8f9fa;padding:30px;border-radius:8px">
                                    <div class="user-icon-preview" style="text-align:center;margin-bottom:20px;">
                                        @if(!empty(ContactusHelper::get('icon')))
                                            <img src="{{ asset('/' . ContactusHelper::get('icon')) }}" alt="Website Icon" style="max-width:60px;max-height:60px;">
                                        @else
                                            <img src="" alt="Website Icon" style="max-width:60px;max-height:60px;">
                                        @endif
                                    </div>  
                                    <h3 class="user-title-preview" style="text-align:center;color:#181f25;margin-bottom:20px;">
                                        Website title
                                    </h3>
                                    <hr>
                                    <h2 style="color:#2d3748;margin-bottom:25px">Hi John Piper,</h2>
                                    <br>
                                    <p style="margin-top:1rem" class="ack_msg user-ack-msg-preview">Thank you for contacting us. We've received your query and will get back to you shortly.</p>

                                    <div style="margin-bottom:25px">
                                        <h5 style="color:#4a5568">Message</h5>
                                        <div style="background-color:white;padding:15px;border-left:3px solid #4299e1">
                                            <p> I want to know more about your services. Please provide me with the details.</p>
                                        </div>
                                    </div>
                                    <p>We appreciate your patience.</p>
                                    <br>
                                    <p class="user-sender-preview">Best Regards,<br>Support Team</p>
                                <hr>
                                    <div style="margin-top:30px;text-align:center;font-size:12px;color:#718096">
                                        <p>This email was sent from the contact form on Laravel</p>
                                        <p class="admin-footer-meta-preview" >
                                            <strong class="user-title-footer">{{ ContactusHelper::get('website_title') }}</strong> | <span class="s_mail muted">{{ ContactusHelper::get('send_email_to') }}</span>
                                        </p>
                                        <p class="admin-footer-date-preview">{{ now()->format('F j, Y \a\t g:i A') }}</p> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>
    $(document).ready(function() {
        // Helper to get settings from PHP
        const settings = @json($contactusSettings ?? []);

        // Set initial preview values
        class ContactusPreview {
            constructor(settings) {
                this.settings = settings || {};
                this.$adminCard = $('.card:contains("Admin Mail Template Preview")');
                this.$userCard = $('.card:contains("User Mail Template Preview")');
                this.bindEvents();
                this.setPreview();
            }

            getFormValue(selector, fallback) {
                const $el = $(selector);
                if ($el.is('input[type="file"]')) {
                    return $el[0].files && $el[0].files[0] ? $el[0].files[0] : fallback;
                }
                return $el.val() || fallback;
            }

            getIconUrl() {
                const file = this.getFormValue('input[name="icon"]', null);
                if (file) {
                    return URL.createObjectURL(file);
                } else if (this.settings.icon) {
                    return '/' + this.settings.icon;
                }
                return '';
            }

            setPreview() {
                // Get values from form or fallback to settings/defaults
                const send_email_to = this.getFormValue('input[name="send_email_to"]', this.settings.send_email_to || 'contactus@yourdomain.com');
                const websiteTitle = this.getFormValue('input[name="website_title"]', this.settings.website_title || 'Website title');
                const websiteLink = this.getFormValue('input[name="website_link"]', this.settings.website_link || '');
                const senderName = this.getFormValue('input[name="sender_name"]', this.settings.sender_name || 'Support Team');
                const adminMsg = this.getFormValue('textarea[name="admin_message"]', this.settings.admin_message || "You have a message from ");
                const userAckMsg = this.getFormValue('textarea[name="user_ack_message"]', this.settings.user_ack_message || "Thank you for contacting us. We've received your query and will get back to you shortly.");
                const displayTitle = this.getFormValue('select[name="display_title"]', this.settings.display_title || 'yes');
                const displayIcon = this.getFormValue('select[name="display_icon"]', this.settings.display_icon || 'yes');
                const contactNumber = this.getFormValue('select[name="contact_number"]', this.settings.contact_number || 'yes');
                const iconUrl = this.getIconUrl();

                // Admin Template
                // Icon
                if (displayIcon === 'yes') {
                    this.$adminCard.find('img[alt="Website Icon"]').attr('src', iconUrl).show();
                } else {
                    this.$adminCard.find('img[alt="Website Icon"]').hide();
                }
                // Title
                if (displayTitle === 'yes') {
                    this.$adminCard.find('.admin-title-preview').text(websiteTitle).show();
                } else {
                    this.$adminCard.find('.admin-title-preview').hide();
                }
                // Phone
                if (contactNumber === 'yes') {
                    this.$adminCard.find('.admin-phone-preview').show();
                } else {
                    this.$adminCard.find('.admin-phone-preview').hide();
                }
                // Reply button
                this.$adminCard.find('.admin-reply-link-preview').attr('href', websiteLink).text('Reply');
                // Admin message
                this.$adminCard.find('.admin-message-preview').text(adminMsg);
                this.$adminCard.find('.s_mail').text(send_email_to);
                this.$userCard.find('.s_mail').text(send_email_to);

                this.$adminCard.find('.user-title-footer').text(websiteTitle).show();
                this.$userCard.find('.user-title-footer').text(websiteTitle).show();
                // User Template
                // Icon
                if (displayIcon === 'yes') {
                    this.$userCard.find('img[alt="Website Icon"]').attr('src', iconUrl).show();
                } else {
                    this.$userCard.find('img[alt="Website Icon"]').hide();
                }
                // Title
                if (displayTitle === 'yes') {
                    this.$userCard.find('.user-title-preview').text(websiteTitle).show();
                } else {
                    this.$userCard.find('.user-title-preview').hide();
                }
                // User acknowledgement message
                this.$userCard.find('.ack_msg').text(userAckMsg);
                // Best Regards, Support Team
                this.$userCard.find('.user-sender-preview').html('Best Regards,<br>' + senderName);
            }

            bindEvents() {
                const self = this;
                $('input, textarea, select').on('input change', function() {
                    self.setPreview();
                });
            }
        }

        // Initialize on document ready
        function setPreview() {} // dummy for compatibility
        new ContactusPreview(settings);
        
        // Bind change events
        $('input, textarea, select').on('input change', setPreview);

        // Initial load
        setPreview();

        // Add ping effect to preview elements when editing form controls
        // Now: effect stays as long as control is focused, removed on blur

        // Map form fields to preview selectors
        const previewMap = {
            'send_email_to': ['.s_mail'],
            'website_title': ['.admin-title-preview', '.user-title-preview', '.user-title-footer'], 
            'sender_name': ['.user-sender-preview'],
            'admin_message': ['.admin-message-preview'],
            'user_ack_message': ['.ack_msg'],
            'display_title': ['.admin-title-preview', '.user-title-preview'],
            'display_icon': ['img[alt="Website Icon"]'],
            'contact_number': ['.admin-phone-preview'],
            'icon': ['img[alt="Website Icon"]']
        };

        // Add CSS for ping effect
        $('<style>')
            .prop('type', 'text/css')
            .html(`
                .ping-effect {
                animation: pulseAnim 1.5s infinite ease-in-out;
                }
                @keyframes pulseAnim {
                 0% {
                        -webkit-box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.7);
                                box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.7);
                    }
                    100% {
                        -webkit-box-shadow: 0 0 0 10px rgba(52, 152, 219, 0);
                                box-shadow: 0 0 0 10px rgba(52, 152, 219, 0);
                    }
                }
            `)
            .appendTo('head');


        // Bind focus/blur to form controls for continuous effect
        $.each(previewMap, function(field, selectors) {
            const inputSelector = 
                field === 'icon'
                    ? 'input[name="icon"]'
                    : (
                        'input[name="' + field + '"], ' +
                        'textarea[name="' + field + '"], ' +
                        'select[name="' + field + '"]'
                    );
            $(document).on('focus', inputSelector, function() {
                selectors.forEach(sel => $(sel).addClass('ping-effect'));
            });
            $(document).on('blur', inputSelector, function() {
                selectors.forEach(sel => $(sel).removeClass('ping-effect'));
            });
        });
    }); 
    </script>

    <!-- Bootstrap JS (Optional, for Bootstrap features like dropdowns, modals, etc.) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</html>