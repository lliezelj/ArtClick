<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Artists;
use App\Models\Inventory;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(){
        $categories = Category::withCount('products')->get();
        return view('customer.shop-category', compact('categories'));
    }

    public function getProductsByCategory($id)
    {
        $products = Products::where('category_id', $id)->get();
        $categories = Category::all();
        $artists = Artists::all();
        $categoryName = $products->isNotEmpty() && $products->first()->category 
                ? $products->first()->category->name 
                : 'No Available products for this category';
        return view('customer.items',compact('categories','products','artists','categoryName'));
    }

    public function viewProductDetails(String $id){
        $viewProductDetails = Products::findOrFail($id);
        $quantity = Inventory::with('product')->where('id', $id)->get();
        return view('customer.items-details',compact('viewProductDetails','quantity'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'productId' => 'required|integer',
            'order_quantity' => 'required|integer|min:1',
        ]);
    
        $product = Products::find($request->productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $orderTotal = $product->price * $request->order_quantity;
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        $existingCartItem = Cart::where('productId', $request->productId)
                                   ->where('user_id', $userId)
                                   ->where('cart_status', ('In Cart'))
                                   ->first();
        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Item already in cart.');
        }
        Cart::create([
            'productId' => $request->productId,
            'order_quantity' => $request->order_quantity,
            'user_id' => $userId,
            'order_total' => $orderTotal,
        ]);
    
        return redirect()->back()->with('success', 'Product ' .$product->name. ' added to cart successfully!');
    }
    


}
