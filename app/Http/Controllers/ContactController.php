<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;

class ContactController extends Controller
{
    public function contact(){
        return view('customer.contact');
    }

    public function question(Request $request){
        if($request->has('submit')){
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $subject = $request->input('subject');
            $message = $request->input('message');

            $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            ];

            $question = Questions::create($data);
            if($question){
                return redirect()->back()->with('success', 'Your Question has successfully sent!');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong try it again!');
            }
        }
        return redirect()->back()->with('error', 'error submission!');
    }
}
