# avsr_sts/contactus

**Version**: v2.0.0  
**Author**: Akhil Vijay & Sreejith P  
**Company**: Soft and Tech Solutions  


## Description
A simple Contact Us form for customer queries. This package allows users to submit inquiries or feedback via a contact form. 

## Features
- Easy to integrate Contact Us form for Laravel users
- Easy Integration
- No API required
- Sends customer queries to a specified email
- Stores contact form data in the database
- Customizable email content

## Installation
To install this package, use the following steps:

1. Clone the repository to your Laravel project or use commmand

    ```bash
        composer require softandtech/contactus

2. Publish the files to your working project:

   ```bash
        php artisan vendor:publish --provider="SoftAndTech\ContactUs\ContactUsServiceProvider"


3. Check new folders and files are added to your 'view' foldwrs and 'public' folders

    ```bash 
    
        ..views
            |vendor
                |contactus 


4. Include the contact form wherwever you want

    ```php
        @include('contactus::contact')


5. Update the 'app/config/conf_contact.php' with your mail id and details

    ```php
        return [
            'send_email_to'=>'your-mail.com',
            'sender_name'=>'your-senders_name'
        ];
    
6. update your env files 
    ```bash
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=<user-name>
        MAIL_PASSWORD=<your-password>
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS="your@mail.com"
        MAIL_FROM_NAME="${APP_NAME}"

7. Clear config and cache ,view and route

    ```bash
        php artisan config:clear
        php artisan cache:clear
        php artisan view:clear
        php artisan optimize
        php artisan route:clear