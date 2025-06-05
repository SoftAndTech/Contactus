<?php

namespace SoftAndTech\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoftAndTech\Contactus\Models\ContactUs;
use SoftAndTech\Contactus\Mail\ContactMailable; 
use SoftAndTech\Contactus\Mail\UserQueryConfirmation;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    //

    public function index(){
        return view('contactus::contact');
    }

    public function send(Request $request)
        {
            $validated = $request->validate([
                'avsrContct_u_name' => 'required|string|max:255',
                'avsrContct_u_email' => 'required|email', 
                'avsrContct_u_msg' => 'required|string',
            ]);
        \Log::info('Contact mail sending triggered', $validated);

        Mail::to(config('conf_contact.send_email_to'))->send(new ContactMailable($validated));
        
        
        // Send confirmation to user
        Mail::to($data['email'])->send(new UserQueryConfirmation($data));

        $feeds = ContactUs::create([
        'name' => $request->avsrContct_u_name,
        'email' => $request->avsrContct_u_email,
        'message' => $request->avsrContct_u_msg,
        ]);
        if ($feeds->wasRecentlyCreated) {
            $message = "Thank you for contacting us! We will get back to you shortly.";
            $status = "success";
        } else {
            $message = "Message not sent. Please try again.";
            $status = "error";
        }
    
        
        
        
        if ($request->ajax()) {
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        }

    }


}
