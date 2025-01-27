<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Catch_;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.index');
    }
    public function send(Request $request)
    {
        // Assuming 'to_email' and 'from_email' are passed from middleware or request
        try {
            // dd($request);
            $fromEmail = $request->from_mail;
            $toEmail = $request->to_mail;
            $add_comment = $request->add_comment;

            // Mail::to($toEmail)->send(new TestEmail());
            // Mail::to($toEmail)->send(new TestEmail());
            // ->from($fromEmail) // Set the sender's email address
            $data = [
                'content' => $add_comment
                // other data...
            ];
            Mail::send('emails.test', $data, function ($message) use ($request) {
                $message->from($request->from_mail, 'Manish'); // Use from_email from request
                $message->to($request->to_mail)->subject('Test Email Subject1234');
            });

            return back()->with('success', 'Email sent successfully!');


            // return response()->json(['message' => 'Email sent successfully!']);
        } catch (Exception $e) {
            logger($e->getMessage());
        }
    }
}
