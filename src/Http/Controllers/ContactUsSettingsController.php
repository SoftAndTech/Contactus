<?php

namespace SoftAndTech\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoftAndTech\Contactus\Models\ContactUs;
use SoftAndTech\Contactus\Models\ContactUsSetting;
use SoftAndTech\Contactus\Mail\ContactMailable; 
use SoftAndTech\Contactus\Mail\UserQueryConfirmation;
use Illuminate\Support\Facades\Mail;
use SoftAndTech\Contactus\Helpers\ContactusHelper;
use SoftAndTech\Contactus\Http\Requests\ContactUsSettingsRequest;

class ContactUsSettingsController extends Controller
{
     public function index()
    {
        return view('contactus::settings.index', [
            'settings' => [
                'send_email_to' => ContactUsSetting::get('send_email_to'),
                'sender_name'   => ContactUsSetting::get('sender_name'),
            ]
        ]);
    }

    public function update(ContactUsSettingsRequest $request)
    {
        try {
             

            $settings = $request->except(['_token', 'icon']);

            foreach ($settings as $key => $value) {
                if (!is_array($value)) {
                    ContactusSetting::set($key, $value);
                }
            }

            // Handle icon upload
            if ($request->hasFile('icon')) {
            // Delete existing icon if exists
            $existingIcon = ContactusSetting::get('icon');
            if ($existingIcon && file_exists(public_path($existingIcon))) {
                @unlink(public_path($existingIcon));
            }

            $file = $request->file('icon');
            $filename = 'icon_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('contactus');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);

            $relativePath = 'contactus/' . $filename;
            ContactusSetting::set('icon', $relativePath);
            }

            return redirect()->back()->with('success', 'Settings updated successfully!');
        }  catch (\Exception $e) {
            return redirect()->back()
            ->with('error', 'An error occurred while updating settings: ' . $e->getMessage())
            ->withInput();
        }
    }
}