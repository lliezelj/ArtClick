<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::with('user')->orderBy('id', 'desc')->get();
        return view('AM.am-orders-list', compact('orders'));
    }

    public function orderIndex(){
        $orders = Orders::with('user')->get();
    }

    public function updateOrderStatus(Request $request, String $id){
        $status = Orders::findOrFail($id);
        $update_stat = $request->input('update_status');
        $estimated_date = $request->input('estimated_date');
        $status->status = $update_stat;
        $status->estimated_date = $estimated_date;
        $status->save();
        if($update_stat === 'Processing'){
        return redirect()->back()->with('success', 'Order ' .$status->id. ' Now in Processing');
        }
        elseif($update_stat === 'Pending'){
            return redirect()->back()->with('success', 'Order ' .$status->id. ' is Pending');
            }
        elseif($update_stat === 'Out for Delivery'){
        return redirect()->back()->with('success', 'Order ' .$status->id. ' is now out for delivery.');
        }
        elseif($update_stat === 'Delivered'){
            return redirect()->back()->with('success', 'Order ' .$status->id. ' has been delivered.');
            }
            else{
                return redirect()->back()->with('success', 'Order ' .$status->id. ' has been cancelled.');
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
    $orders = Orders::with('user')->whereDate('order_date', $date)->get();
    return view('AM.am-orders-list-byDate', compact('orders', 'date'));
}
  
}
