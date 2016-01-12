<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /*
     * Show form for sending email to user
     */
    public function showForm(Request $request)
    {
        $sendTo = $request->email;
        $requestId = $request->requestId;
        return view('emails.contact', compact('sendTo', 'requestId'));
    }

    /*
     * Send an email to user
     */
    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::send('emails.message',
            ['msg' => $request->message],
            function($message) use ($request) {
                $message->to($request->email)
                    ->subject($request->subject);
        });

        return redirect()
            ->route('request', [$request->requestId])
            ->with('status', 'Email was succesfully sent!');
    }
}
