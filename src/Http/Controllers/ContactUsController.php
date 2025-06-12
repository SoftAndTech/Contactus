<?php

namespace SoftAndTech\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoftAndTech\Contactus\Models\ContactUs;
use SoftAndTech\Contactus\Models\ContactUsSetting;
use SoftAndTech\Contactus\Mail\UserQueryConfirmation;
use SoftAndTech\Contactus\Mail\ContactMailable; 
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
         

        Mail::to(ContactUsSetting::get('send_email_to', 'contact@mail.com'))->send(new ContactMailable(
                $validated['avsrContct_u_msg'],
                $validated['avsrContct_u_name'],
                $validated['avsrContct_u_email']
        ));
        
        
        // Send confirmation to user
        Mail::to($validated['avsrContct_u_email'])->send(new UserQueryConfirmation($validated)); 

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
