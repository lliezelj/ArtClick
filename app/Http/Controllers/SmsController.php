<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms(){
   

$sid = getenv("TWILIO_SID");
$token = getenv("TWILIO_TOKEN");
$senderNumber = getenv("TWILIO_PHONE");

$twilio = new Client($sid, $token);
$message = $twilio->messages->create(
    "+639469303572", // To
    [
        "body" =>
            "Defended na to! for the win",
        "from" => $senderNumber,
    ]
);
dd("Success");

    }
}
