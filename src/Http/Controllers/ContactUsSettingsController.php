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

    public function update(Request $request)
    {
        try {
            $request->validate([
            'send_email_to' => 'required|email',
            'sender_name' => 'required|string|max:255',
            'admin_message' => 'nullable|string',
            'user_ack_message' => 'nullable|string',
            'website_title' => 'nullable|string|max:255',
            'website_link' => 'nullable|url',
            'icon' => 'nullable|image|max:2048',
            'contact_number' => 'nullable|in:yes,no',
            'display_title' => 'nullable|in:yes,no',
            'display_icon' => 'nullable|in:yes,no',
            ]);

            $settings = $request->except(['_token', 'icon']);

            foreach ($settings as $key => $value) {
            ContactusSetting::set($key, $value);
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
            ->withErrors($e->validator)
            ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
            ->with('error', 'An error occurred while updating settings: ' . $e->getMessage())
            ->withInput();
        }
    }
}