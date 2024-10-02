<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();

        return view('contact', compact('sponsors'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'firstname' => 'required',
                'secondname' => 'required',
                'email' => 'required|email',
                "phone" => 'required',
                "category" => 'required',
                "subject" => 'required',
                'message' => 'required',
            ]);

            $contact = new Contact();
            $contact->name = $request->firstname . ' ' . $request->secondname;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->category = $request->category;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->status = "Pending";

            $contact->save();

            Mail::send('emails.contact', ['contact' => $contact], function ($message) use ($contact) {
                $message->to(env('CONTACT_EMAIL')) // Replace with admin's email
                    ->subject($contact->subject)
                    ->replyTo($contact->email);
            });

            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $th) {
            dd($th);
        }
    }
}
