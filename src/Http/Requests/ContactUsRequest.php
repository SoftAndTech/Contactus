<?php


namespace SoftAndTech\Contactus\Http\Requests; 
 
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
   public function rules()
    {
        return [
            'avsrContct_u_name' => 'required|string|max:255',
            'avsrContct_u_email' => 'required|email',
            'avsrContct_u_phone' => 'nullable|string|regex:/^\+?[0-9\s\-()]{7,20}$/',
            'avsrContct_u_msg' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'avsrContct_u_name.required' => 'Your name is required.',
            'avsrContct_u_email.required' => 'Your email is required.',
            'avsrContct_u_email.email' => 'Please enter a valid email address.',
            'avsrContct_u_phone.regex' => 'Please enter a valid phone number (e.g. +91-1234567890).',
            'avsrContct_u_msg.required' => 'Please enter your message.',
        ];
    }

}
