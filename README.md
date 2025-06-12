# SoftAndTech\Contactus

**Version**: v2.0.0  
**Author**: Akhil Vijay & Sreejith P  
**Company**: Soft and Tech Solutions  
**License**: MIT

## Description
A simple Contact Us form for customer queries. This package allows users to submit inquiries or feedback via a contact form. Additionally we provide a configuration page to customize the mail template. Additionally contact_conf is now depretiated

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
    
4. update your `env` files 

    ```bash
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=<user-name>
        MAIL_PASSWORD=<your-password>
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS="your@mail.com"
        MAIL_FROM_NAME="${APP_NAME}"

5. Navigate links

    ```bash
        yourdomain.com/contactus_settings  // for settings
        yourdomain.com/contact_us  // for contact us form if you want to run the form directly

    or
    
    Include the contact form wherwever you want.

    ```php
        @include('contactus::contact')
6. Run migration
     This package requires 2 tables. One for configuration and other for saving customer's contact data.

    ```bash
       php artisan migrate

7. Clear config and cache ,view and route

    ```bash
        php artisan config:clear
        php artisan cache:clear
        php artisan view:clear
        php artisan optimize
        php artisan route:clear


8. Initilize settings
    
    From your browser, go to 'yourdomain.com/contactus_settings' and save your configuratrion before running the contact us form.

9. If you want to add 'auth' requirements, just wrap the middleware to the routes in
        Contactus\vendor\softandtech\contactus\src\routes\web.php