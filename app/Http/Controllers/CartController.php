<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cart;
use App\models\Orders;
use App\models\Inventory;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must log in first before you can view your cart.');
        }
        $user_id =  Auth::user()->id; 
        $myCart = Cart::with('product')->where('user_id', $user_id)->orderBy('created_at','desc')->get(); 
        $myCartTotal = $myCart->where('cart_status','In cart')->sum('order_total');
        $hasItemsInCart = $myCart->contains('cart_status', 'In cart');
        return view('customer.cart', compact('myCart', 'myCartTotal','hasItemsInCart'));
    }

    public function deleteCart(String $id){
        $cart = Cart::with('product')->findOrFail($id);
        $cart_status = 'Removed';
        $cart->cart_status = $cart_status;
        $name = $cart->product->name;
        $cart->save();
        return redirect()->back()->with('success', 'Item ' . $name . ' removed from your cart successfully!');
    }

    public function checkOut(String $id)
{
    
    $user_id = Auth::user()->id;
    $checkOut = Cart::with('product')->where('user_id', $user_id)->where('cart_status', 'In cart')->get();
    $total_order = $checkOut->sum('order_total') + 50;
    $sub_total = $checkOut->sum('order_total');

    $orders = Orders::all();
    return view('customer.checkout', compact('checkOut','total_order','sub_total','orders'));
}

public function placeOrder(Request $request)
{
    if($request->has('submit')){
    $user_id = Auth::user()->id;
    $cartItems = Cart::with('product')->where('user_id', $user_id)->where('cart_status', 'In cart')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    foreach ($cartItems as $item) {
        $inventory = Inventory::where('product_id', $item->productId)->first();

        if (!$inventory) {
            return redirect()->back()->with('error', 'Inventory record not found for product: ' . $item->product->name);
        }

        if ($inventory->quantity < 5) {
            return redirect()->back()->with('error', 'Sorry, the product ' . $item->product->name . ' has insufficient stock and is currently unavailable.');
        }
    }

    $productNames = $cartItems->map(function ($item) {
        return $item->product->name . ' (' . $item->order_quantity . ')';
    })->toArray();
    
    $products = implode(', ', $productNames);
    $totalQuantity = $cartItems->sum('order_quantity');

    $total_order = $cartItems->sum('order_total') + 50;
    $status = 'Pending';
    $mode_of_payment = $request->input('mode_of_payment');
    $gcash_reference = $request->input('gcash_reference');

    $data = [
        'userId' => $user_id,
        'products' => $products,
        'status' => $status,
        'total_price' => $total_order,
        'order_date' => now(),
        'totalOrderQuantities' => $totalQuantity,
        'mode_of_payment' => $mode_of_payment,
        'gcash_reference' => $gcash_reference,
    ];
    $orders = Orders::create($data);
    if ($orders) {
        foreach ($cartItems as $item) {
            $inventory = Inventory::where('product_id', $item->productId)->first();
            if ($inventory) {
                $inventory->quantity -= $item->order_quantity;
                $inventory->save();
            } else {
                return redirect()->back()->with('error', 'Inventory record not found for product: ' . $item->product->name);
            }
        }
        $user_id = Auth::user()->id;
        Cart::where('user_id', $user_id)->where('cart_status', 'In cart')->update(['cart_status' => 'Ordered']);

        return redirect()->back()->with('success', 'Thank you! Your order has been successfully submitted. You will receive a confirmation email shortly with your order details.');
    } else {
        return redirect()->back()->with('error', ' Sorry unable to process your orders!');
    }
    return redirect()->back()->with('error', 'Error submission!');
}

}

public function cancelOrder(String $id){
    $order = Orders::findOrFail($id);
    $order->status = 'Cancelled';
    $order->save();
    return redirect()->back()->with('success', ' Order Cancelled Successfully'); 
}

public function viewOrders(){
    $user = Auth::user()->id;
    $orders = Orders::where('status', '!=', 'Cancelled')
    ->where('userId', $user)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('customer.view-orders', compact('orders'));
}
}
