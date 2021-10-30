<?php

namespace App\Http\Controllers;

use App\Mail\ContactReceived;
use App\Mail\GuestContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs()
    {
    return view('contact_us');
    }
    public function storeContact(Request $request)
    {
        $contact = $request->all();

        Mail::To('cliente@gmail.com')->send(new ContactReceived($contact));

        return redirect()->back()->with('message','Grazie per averci contattato ,verrai ricontattato il prima possibile!');
    }

    public function guestContact()
    {
    return view('guest_contact');
    }
    public function storeGuestContact(Request $request)
    {
        $contact = $request->all();

        Mail::To('cliente@gmail.com')->send(new GuestContact($contact));

        return redirect()->back()->with('message','Grazie per averci contattato ,verrai ricontattato il prima possibile!');
    }


}
