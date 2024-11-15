<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
// use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Carbon\Carbon;
use Vonage\SMS\Message\SMS;


class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::with('user')->orderBy('id', 'desc')->get();
        return view('AM.am-orders-list', compact('orders'));
    }

    public function orderIndex(){
        $orders = Orders::with('user')->get();
    }

//     public function updateOrderStatus(Request $request, String $id){
//         $status = Orders::findOrFail($id);
//         $update_stat = $request->input('update_status');
//         $estimated_date = $request->input('estimated_date');
//         $status->status = $update_stat;
//         $status->estimated_date = $estimated_date;
//         $status->save();
//         if($update_stat === 'Processing'){
//         return redirect()->back()->with('success', 'Order ' .$status->id. ' Now in Processing');
//         }
//         elseif($update_stat === 'Pending'){
//             return redirect()->back()->with('success', 'Order ' .$status->id. ' is Pending');
//             }
//         elseif($update_stat === 'Out for Delivery'){
//         return redirect()->back()->with('success', 'Order ' .$status->id. ' is now out for delivery.');
//         }
//         elseif($update_stat === 'Delivered'){
//             return redirect()->back()->with('success', 'Order ' .$status->id. ' has been delivered.');
//             }
//             else{
//                 return redirect()->back()->with('success', 'Order ' .$status->id. ' has been cancelled.');
//             }


// }


// public function updateOrderStatus(Request $request, String $id)
// {
//     $status = Orders::with('user')->findOrFail($id);
//     $update_stat = $request->input('update_status');
//     $estimated_date = $request->input('estimated_date');
//     $status->status = $update_stat;
//     $status->estimated_date = $estimated_date;
//     $username = $status->user->first_name;
//     $phone = $status->user->phone_number;
//     $formattedDate = Carbon::parse($estimated_date)->format('F j, Y');

//     // Save the status update
//     $status->save();

//     // Twilio setup
//     $sid = env('TWILIO_SID');
//     $token = env('TWILIO_TOKEN');
//     $twilio = new Client($sid, $token);

//     if ($update_stat === 'Delivered') {
//                 $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' has been successfully delivered. Thank you for choosing us!. Mabuhay!';
//             } else {
//                 $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' status is updated to ' . $update_stat 
//                            . '. Estimated delivery date: ' . $formattedDate;
//             }
//         if ($update_stat === 'Processing') {
//                     return redirect()->back()->with('success', 'Order ' . $status->id . ' is now in Processing.');
//                 } elseif ($update_stat === 'Pending') {
//                     return redirect()->back()->with('success', 'Order ' . $status->id . ' is Pending.');
//                 } elseif ($update_stat === 'Out for Delivery') {
//                     return redirect()->back()->with('success', 'Order ' . $status->id . ' is now out for delivery.');
//                 } elseif ($update_stat === 'Delivered') {
//                     return redirect()->back()->with('success', 'Order ' . $status->id . ' has been delivered.');
//                 } else {
//                     return redirect()->back()->with('success', 'Order ' . $status->id . ' has been cancelled.');
//                 }
//     $twilio->messages->create(
//         $phone, // Recipient's phone number
//         [
//             'from' => env('TWILIO_PHONE'),
//             'body' => $message
//         ]
//     );

//     return redirect()->back()->with('success', 'Order ' . $status->id . ' status updated to ' . $update_stat);
// }
// public function updateOrderStatus(Request $request, String $id)
// {
//     // Find the order
//     $status = Orders::with('user')->findOrFail($id);

//     // Get the updated status and estimated date
//     $update_stat = $request->input('update_status');
//     $estimated_date = $request->input('estimated_date');

//     // Format the estimated date in a readable format
//     $formattedDate = Carbon::parse($estimated_date)->format('F j, Y');

//     // Update order status and estimated date
//     $status->status = $update_stat;
//     $status->estimated_date = $estimated_date;
//     $status->save();

//     // Get the user's first name
//     $username = $status->user->first_name;

//     // Get the user's phone number
//     $userPhone = $status->user->phone_number;

//     // Log the phone number
//     \Log::info('User phone number: ' . $userPhone);

//     // Check if phone number exists
//     if (empty($userPhone)) {
//         \Log::info('User does not have a phone number.');
//         return redirect()->back()->with('error', 'User does not have a phone number.');
//     }

//     // Ensure the phone number is in the correct international format
//     if (substr($userPhone, 0, 1) !== '+') {
//         $userPhone = '+63' . $userPhone; // Philippines country code, change if necessary
//     }

//     // Log the final phone number
//     \Log::info('Final phone number: ' . $userPhone);

//     // Setup Vonage credentials
//     $vonageClient = new Client(new Basic(
//         config('services.vonage.api_key'),
//         config('services.vonage.api_secret')
//     ));

//     // Create the message with formatted estimated date or a unique message if delivered
//     if ($update_stat === 'Delivered') {
//         $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' has been successfully delivered. Thank you for choosing us!. Mabuhay!';
//     } else {
//         $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' status is updated to ' . $update_stat 
//                    . '. Estimated delivery date: ' . $formattedDate;
//     }

//     // Send SMS via Vonage
//     try {
//         $vonageSMS = new SMS($userPhone, config('services.vonage.phone_number'), $message);
//         $vonageClient->sms()->send($vonageSMS);
//     } catch (\Exception $e) {
//         \Log::error('Vonage SMS Error: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Failed to send SMS notification.');
//     }

//     if ($update_stat === 'Processing') {
//         return redirect()->back()->with('success', 'Order ' . $status->id . ' is now in Processing.');
//     } elseif ($update_stat === 'Pending') {
//         return redirect()->back()->with('success', 'Order ' . $status->id . ' is Pending.');
//     } elseif ($update_stat === 'Out for Delivery') {
//         return redirect()->back()->with('success', 'Order ' . $status->id . ' is now out for delivery.');
//     } elseif ($update_stat === 'Delivered') {
//         return redirect()->back()->with('success', 'Order ' . $status->id . ' has been delivered.');
//     } else {
//         return redirect()->back()->with('success', 'Order ' . $status->id . ' has been cancelled.');
//     }
// }

public function updateOrderStatus(Request $request, String $id)
{
    // Find the order
    $status = Orders::with('user')->findOrFail($id);

    // Get the updated status and estimated date
    $update_stat = $request->input('update_status');
    $estimated_date = $request->input('estimated_date');

    // Format the estimated date in a readable format
    $formattedDate = Carbon::parse($estimated_date)->format('F j, Y');

    // Update order status and estimated date
    $status->status = $update_stat;
    $status->estimated_date = $estimated_date;
    $status->save();

    // Get the user's first name
    $username = $status->user->first_name;

    // Get the user's phone number
    $userPhone = $status->user->phone_number;

    // Log the phone number
    \Log::info('User phone number: ' . $userPhone);

    // Check if phone number exists
    if (empty($userPhone)) {
        \Log::info('User does not have a phone number.');
        return redirect()->back()->with('error', 'User does not have a phone number.');
    }

    // Ensure the phone number is in the correct international format
    if (substr($userPhone, 0, 1) !== '+') {
        $userPhone = '+63' . $userPhone; // Philippines country code, change if necessary
    }

    // Log the final phone number
    \Log::info('Final phone number: ' . $userPhone);

    // Setup Vonage credentials
    $vonageClient = new Client(new Basic(
        config('services.vonage.api_key'),
        config('services.vonage.api_secret')
    ));

    // Create the message with formatted estimated date or a unique message if delivered
    if ($update_stat === 'Delivered') {
        $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' has been successfully delivered. Thank you for choosing us!. Mabuhay!';
    } else {
        $message = 'Good Day ' . $username . '! Your Order ' . $status->id . ' status is updated to ' . $update_stat 
                   . '. Estimated delivery date: ' . $formattedDate;
    }

    // Send SMS via Vonage
    try {
        $vonageSMS = new SMS($userPhone, config('services.vonage.phone_number'), $message);
        $vonageClient->sms()->send($vonageSMS);
    } catch (\Exception $e) {
        \Log::error('Vonage SMS Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to send SMS notification.');
    }

    if ($update_stat === 'Processing') {
        return redirect()->back()->with('success', 'Order ' . $status->id . ' is now in Processing.');
    } elseif ($update_stat === 'Pending') {
        return redirect()->back()->with('success', 'Order ' . $status->id . ' is Pending.');
    } elseif ($update_stat === 'Out for Delivery') {
        return redirect()->back()->with('success', 'Order ' . $status->id . ' is now out for delivery.');
    } elseif ($update_stat === 'Delivered') {
        return redirect()->back()->with('success', 'Order ' . $status->id . ' has been delivered.');
    } else {
        return redirect()->back()->with('success', 'Order ' . $status->id . ' has been cancelled.');
    }
}








public function orderDateIndex(){
    $orders = Orders::selectRaw('DATE(order_date) as order_date, COUNT(*) as order_count')
    ->groupBy(DB::raw('DATE(order_date)'))
    ->get();

return view('AM.am-orders-dates', compact('orders'));

}

public function showOrdersByDate($date)
{
    $orders = Orders::with('user')->whereDate('order_date', $date)
    ->orderBy('created_at','desc')
    ->get();
    return view('AM.am-orders-list-byDate', compact('orders', 'date'));
}
  
}
