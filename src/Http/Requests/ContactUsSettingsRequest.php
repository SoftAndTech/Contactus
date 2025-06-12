<?php

namespace SoftAndTech\Contactus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsSettingsRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return true; // adjust if you have auth logic
    // }

    public function rules(): array
    {
        return [
            'send_email_to'   => 'required|email',
            'sender_name'     => 'required|string|max:255',
            'admin_message'   => 'nullable|string',
            'user_ack_message'=> 'nullable|string',
            'website_title'   => 'nullable|string|max:255',
            'website_link'    => 'nullable|url',
            'icon'            => 'nullable|image|max:2048',
            'contact_number'  => 'nullable|in:yes,no',
            'display_title'   => 'nullable|in:yes,no',
            'display_icon'    => 'nullable|in:yes,no',
        ];
    }

    public function messages(): array
    {
        return [
            'send_email_to.required' => 'The email field is required.',
            'send_email_to.email'    => 'Enter a valid email address.',
            'icon.image'             => 'The uploaded file must be an image.',
            'icon.max'               => 'Image size must not exceed 2MB.',
            'website_link.url'       => 'Website link must be a valid URL.',
        ];
    }
}
