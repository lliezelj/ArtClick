<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user_id =  Auth::user()->id; 
        $myCart = Cart::with('product')->where('user_id', $user_id)->get();
        $myCartTotal = $myCart->sum('order_total');
        return view('customer.cart', compact('myCart', 'myCartTotal'));
    }

    public function deleteCart(String $id){
        $cart = Cart::with('product')->findOrFail($id);
        $name = $cart->product->name;
        $cart->delete();
        return redirect()->back()->with('success', 'Item ' . $name . ' removed from your cart successfully!');
    }

    public function checkOut(String $id)
{
    $user_id = Auth::user()->id;
    $checkOut = Cart::with('product')->where('user_id', $user_id)->get();
    if (!$checkOut) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }
    $total_order = $checkOut->sum('order_total') + 50;
    $sub_total = $checkOut->sum('order_total');
    return view('customer.checkout', compact('checkOut','total_order','sub_total'));
}

}
