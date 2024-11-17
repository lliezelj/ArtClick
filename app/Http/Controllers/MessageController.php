<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Mail\ReplyMessageMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(){
        $messages = Messages::all();
        return view('AM.am-messages', compact('messages'));
    }

    public function guestMessage(Request $request){
        if($request->has('submit')){
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $data = [
        'fullname' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'subject' => $subject,
        'message' => $message
        ];

        $message = Messages::create($data);
        if($message){
            return redirect()->back()->with('success', 'Your Messages was sent Successfully');
        }
        else
        return redirect()->back()->with('error', 'Something went wrong!');
        }

        return redirect()->back()->with('error', 'Error Submission!');
    }
    public function replyMessage(Request $request, string $id)
    {
        $reply = $request->input('reply'); // The reply content
        $reply_status = 'viewed';         // The updated status

        $replyMessage = Messages::findOrFail($id);
        $replyMessage->status = $reply_status;
        $replyMessage->reply = $reply; // Assign the reply content
        $replyMessage->save();         // Save changes to the database
    
        // Send the email with the reply
        Mail::to($replyMessage->email)->send(
            new ReplyMessageMail($replyMessage, $reply) // Pass message and reply
        );
    
        return redirect()->back()->with('success', 'Reply sent');
    }

    public function delete(Request $request, String $id){
    $messageDelete = Messages::findOrFail($id);
    $messageDelete->delete();
    return redirect()->back()->with('success', 'Message deleted Successfully');
    }
    
}
