<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormSubmission;
use Mail;

class ContactFormController extends Controller
{
    public function listSubmissions()
    {
        $submissions = ContactFormSubmission::all();
        return view('admin.contact_submissions', compact('submissions'));
    }

    public function replyToSubmission(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $submission = ContactFormSubmission::findOrFail($id);

        // Send reply email
        Mail::raw($request->reply, function ($message) use ($submission) {
            $message->to($submission->email)
                ->subject('Reply to your contact form submission');
        });

        return redirect()->back()->with('success', 'Reply sent successfully.');
    }
}


