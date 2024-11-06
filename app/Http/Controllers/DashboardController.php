<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $totalPurchased = Orders::where('status', 'Delivered')->sum('totalOrderQuantities');
       
        $lowStockItems = DB::table('inventory')
        ->join('products', 'inventory.product_id', '=', 'products.id')
        ->join('category', 'products.category_id', '=', 'category.id') // Corrected the join and table name
        ->select('inventory.*', 'products.name', 'products.product_image', 'category.name AS categoryName') // Fixed alias syntax
        ->whereNotNull('inventory.quantity')
        ->orderBy('inventory.quantity', 'asc')
        ->limit(5)
        ->get();


        $topProducts = Cart::select(
            'add_to_cart.productId',
            DB::raw('SUM(order_quantity) as total_quantity'),
            'products.product_image',
            'products.name'
        )
        ->join('products', 'products.id', '=', 'add_to_cart.productId')
        ->groupBy('add_to_cart.productId', 'products.product_image', 'products.name')
        ->orderByDesc('total_quantity')
        ->where('cart_status', 'Ordered')
        ->limit(10)
        ->get();
    

        return view('AM.am-dashboard', compact('topProducts','lowStockItems','totalPurchased'));
    }
}
