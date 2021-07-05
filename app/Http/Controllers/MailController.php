<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required',
            'subject' => 'required|min:4',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'OK', 400]);
        }

        $details = [
            'title' => 'Mail from my portfolio',
            'body' => $request->message,
            'email' => $request->email,
            'name' => $request->name
        ];

        $subject = $request->subject;

        try {
            Mail::to('ashrafuldowlaunited532@gmail.com')->send(new SendMail($details, $subject));
            return response()->json(['msg' => 'OK', 200]);
        } catch (\Throwable$th) {
            return response()->json(['msg' => 'Failed to send email', 400]);
        }

    }
}
