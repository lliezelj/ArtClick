<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Inventory;
use App\Models\Expenses;
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
        ->orderByDesc('total_quantity','desc')
        ->where('cart_status', 'Ordered')
        ->limit(10)
        ->get();
        
        // Total Net Income
        $totalSales = Orders::where('status', 'Delivered')->sum('total_price');
        $totalExpenses = Expenses::sum('amount');
        $totalNetIncome = $totalSales - $totalExpenses;



        // NET INCOME GRAPH
        $expenses = Expenses::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(amount) as total_expense')
        ->groupBy(DB::raw('MONTH(date), YEAR(date)'))
        ->get();


    $monthlySales = Orders::selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, SUM(total_price) as total_sales')
        ->where('status', 'Delivered')
        ->groupBy(DB::raw('MONTH(updated_at), YEAR(updated_at)'))
        ->get();


    $monthlyData = collect();

    foreach ($expenses as $expense) {
        $monthlyData->push([
            'year' => $expense->year,
            'month' => $expense->month,
            'total_expense' => $expense->total_expense,
            'total_sales' => 0, 
            'net_income' => -$expense->total_expense 
        ]);
    }

    // Add sales data and calculate net income
    foreach ($monthlySales as $sale) {
        $existingEntryIndex = $monthlyData->search(function ($item) use ($sale) {
            return $item['year'] == $sale->year && $item['month'] == $sale->month;
        });

        if ($existingEntryIndex !== false) {
            $existingEntry = $monthlyData->get($existingEntryIndex);
            $existingEntry['total_sales'] = $sale->total_sales;
            $existingEntry['net_income'] = $sale->total_sales - $existingEntry['total_expense']; // Calculate net income
            $monthlyData->put($existingEntryIndex, $existingEntry);
        } else {
            // If no matching entry for the month, add a new one
            $monthlyData->push([
                'year' => $sale->year,
                'month' => $sale->month,
                'total_expense' => 0,
                'total_sales' => $sale->total_sales,
                'net_income' => $sale->total_sales // Net income starts with sales
            ]);
        }
    }

    // Sort the data by year and month
    $monthlyData = $monthlyData->sortBy(['year', 'month'])->values();

    // Extract years for dropdown
    $years = $monthlyData->pluck('year')->unique();
    
    $orderStatusCounts = [
        'Pending' => Orders::where('status', 'Pending')->count(),
        'Processing' => Orders::where('status', 'Processing')->count(),
        'Out for Delivery' => Orders::where('status', 'Out for Delivery')->count(),
        'Delivered' => Orders::where('status', 'Delivered')->count(),
        'Cancelled' => Orders::where('status', 'Cancelled')->count(),
    ];

    $theMonthlySales = Orders::selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, SUM(total_price) as total_sales')
    ->where('status', 'Delivered')
    ->groupBy(DB::raw('YEAR(updated_at), MONTH(updated_at)'))
    ->get();

// Get the distinct years from the sales data
$theYears = $theMonthlySales->pluck('year')->unique();
    

        return view('AM.am-dashboard', compact('topProducts','lowStockItems','totalPurchased','totalNetIncome','totalSales','totalExpenses','monthlyData', 'years','orderStatusCounts','theMonthlySales','theYears'));
    }


}
