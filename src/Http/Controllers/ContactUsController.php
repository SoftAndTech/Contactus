<?php

namespace SoftAndTech\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoftAndTech\Contactus\Models\ContactUs;
use SoftAndTech\Contactus\Models\ContactUsSetting;
use SoftAndTech\Contactus\Mail\UserQueryConfirmation;
use SoftAndTech\Contactus\Mail\ContactMailable; 
use Illuminate\Support\Facades\Mail;
use SoftAndTech\Contactus\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contactus::contact');
    }

    public function send(ContactUsRequest $request)
    {
        $validated = $request->validated();

        try {
            // Send email to admin
            Mail::to(ContactUsSetting::get('send_email_to', 'contact@mail.com'))
                ->send(new ContactMailable($validated));

            // Send confirmation to user
            Mail::to($validated['avsrContct_u_email'])
                ->send(new UserQueryConfirmation($validated));

        } catch (\Exception $e) {
            \Log::error('Contact form mail failed: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'We were unable to send your message at the moment. Please try again later.',
                ]);
            }

            return redirect()->back()->withErrors([
                'email' => 'Unable to send your message at the moment.'
            ]);
        }

        $feeds = ContactUs::create([
            'name'    => $validated['avsrContct_u_name'],
            'email'   => $validated['avsrContct_u_email'],
            'u_phone' => $validated['avsrContct_u_phone'] ?? null,
            'message' => strip_tags($validated['avsrContct_u_msg']),
        ]);

        $status  = $feeds->wasRecentlyCreated ? 'success' : 'error';
        $message = $feeds->wasRecentlyCreated 
                    ? 'Thank you for contacting us! We will get back to you shortly.'
                    : 'Message not sent. Please try again.';

        if ($request->ajax()) {
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        }

        return redirect()->back()->with($status, $message);
    }
}
