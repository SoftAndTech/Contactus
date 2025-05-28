<?php

namespace SoftAndTech\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use avsr_sts\Contactus\Models\ContactUs;
use avsr_sts\Contactus\Mail\ContactMailable; 
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    //

    public function index(){
        return view('contactus::contact');
    }

    public function send(Request $request)
        {
            
            
        Mail::to(config('conf_contact.send_email_to'))->send(new ContactMailable(
            $request->avsrContct_u_msg,
            $request->avsrContct_u_name,
            $request->avsrContct_u_email));

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
