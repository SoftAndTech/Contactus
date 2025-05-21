$(document).ready(function () {
    $('#sumb_message').on('click', function (e) {
        e.preventDefault();
        const emailField = document.getElementById('avsrContct_u_email');
        if (!avsr_form_contact.checkValidity()) {
            avsr_form_contact.reportValidity();
            return;
        }
        if (!isValidEmail(emailField.value)) {
            alert('Please provide a valid email address');
            return;
        }
        $('.contactMessage').css('display', 'block');
        $('#avsr_loading').text('Please wait..'); 
        let formData = new FormData(document.getElementById('avsr_form_contact'));
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));


        $.ajax({
            type: 'POST',
            url: contactUsRoute,
            data: formData,
            contentType: false, // Required for FormData usage in jQuery AJAX
            processData: false, // Required for FormData usage in jQuery AJAX
            beforeSend: function () {
                $('#sumb_message').attr('disabled', true);
                $('#sumb_message .btn-text').text('Sending...');
                $('#sumb_message .spinner').show();
                $('#avsr_loading').css('display', 'inline-block');

            },
            success: function (response) {
                if (response.status === 'success') {
                    $('#avsr_loading').text('');
                    $('#avsr_loading').css('display', 'none');
                    $('#contactMessage').text(response.message);
                    $('#contactMessage').css('background', '#cbffc6');
                    $('#contactMessage').css('color', '#1a8c27');
                    $('#contactMessage').css('display', 'inline-block');
                    document.getElementById('avsr_form_contact').reset(); 
                }
            },
            error: async function (xhr) {
                $('#avsr_loading').text('').css('display', 'none');
                let message = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    } 
                $('#contactMessage').text(message);
                $('#contactMessage').css('background', '#ffc6c6');
                $('#contactMessage').css('color', '#8c1a1a');
                $('#contactMessage').css('display', 'inline-block');
                await new Promise(resolve => setTimeout(resolve, 3000));

                $('.contactMessage').css('display', 'none');
                $('#contactMessage').css('display', 'none');
                console.log("Error submitting contact form:", xhr);
                document.getElementById('avsr_form_contact').reset(); 
            },
            complete: async function (e) {
                await new Promise(resolve => setTimeout(resolve, 3000));

                $('#avsr_loading').text('').css('display', 'none');
                $('.contactMessage, #contactMessage').css('display', 'none');
                $('#sumb_message .spinner').hide();
                $('#sumb_message .btn-text').text('Send Message');
                $('#sumb_message').attr('disabled', false);

            }
            
        });
    });
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
