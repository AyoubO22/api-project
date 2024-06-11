<?php
namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\ContactReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactReplyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contact_form_id' => 'required|exists:contact_forms,id',
            'reply' => 'required',
        ]);

        $contactForm = ContactForm::find($request->contact_form_id);

        $reply = new ContactReply([
            'contact_form_id' => $contactForm->id,
            'reply' => $request->reply,
        ]);
        $reply->save();

        Mail::to($contactForm->email)->send(new ContactReplyMail($reply));

        return redirect()->back()->with('success', 'Reply sent successfully!');
    }
}
