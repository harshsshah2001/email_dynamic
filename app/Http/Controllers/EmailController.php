<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
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


       $validate = $request->validate([
            'from_mail' => 'required|email',
            'to_mail' => 'required|email',
            'add_comment' => 'required|string',
        ]);

        $fromEmail = $validate['from_mail'];
        $toEmail = $validate['to_mail'];
        $add_comment = $validate['add_comment'];


        try {

            Customer::create([
                'from_mail' => $fromEmail,
                'to_mail' => $toEmail,
                'add_comment' => $add_comment,
            ]);

            // dd($request);
            $fromEmail = $request->from_mail;
            $toEmail = $request->to_mail;   
            $add_comment = $request->add_comment;


            $data = [
                'content' => $add_comment

            ];
            Mail::send('emails.test', $data, function ($message) use ($request) {
                $message->from($request->from_mail, 'harsh');
                $message->to($request->to_mail)->subject('Test Email Subject1234');
            });

            return back()->with('success', 'Email sent successfully!');


        } catch (Exception $e) {
            logger($e->getMessage());
        }
    }
}
