<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vnd_avsr_styles/avsrcont.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     
</head>
<body>
    <div class="form-container">
        <div class="contactMessage" style="display:none;">
            <p id="avsr_loading">Please wait..</p>
            <span id="contactMessage" style="display: none" ></span>
        </div> 
        <h1 class="text-center mb-2">Contact Us</h1>
        <h5 class="text-muted text-center mb-4">!! We would like to hear from you</h5>
        <form  method="post" name="avsr_form_contact" id="avsr_form_contact">
            
            <div class="form-group">
                <label for="avsrContct_u_name">Name</label>
                <input type="text" class="form-control" id="avsrContct_u_name" name="avsrContct_u_name" required>
            </div>
            <div class="form-group">
                <label for="avsrContct_u_email">Email address</label>
                <input type="email" class="form-control" id="avsrContct_u_email" name="avsrContct_u_email" required>
            </div>
            <div class="form-group">
                <label for="avsrContct_u_msg">Message</label>
                <textarea class="form-control" id="avsrContct_u_msg" name="avsrContct_u_msg" rows="5" required></textarea>
            </div>
            <div class="btn-holder form-button-holder">
                <button type="button" id="sumb_message" class="btn btn-primary">
                <span class="btn-text">Send Message</span>
                <i class="fas fa-spinner fa-spin spinner" style="display:none;"></i>
                </button>
                <button type="reset" class="btn btn-secondary ml-2">Reset</button>
            </div>
        </form>
    </div>
</body>
  
    <!-- Bootstrap JS (Optional, for Bootstrap features like dropdowns, modals, etc.) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
    <script>
        var contactUsRoute = "{{ route('contactus') }}";
    </script>
    <script src="{{ asset('vendr_avsr_script/con_script.js') }}"></script>

    
</html>
