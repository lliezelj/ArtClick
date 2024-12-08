<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Expenses;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class SalesController extends Controller
{
    public function dailySales(){
    
    $dailySales = Orders::selectRaw('DATE(updated_at) as date, SUM(total_price) as total_sales, COUNT(*) as total_orders')
    ->where('status', 'Delivered')
    ->groupBy(DB::raw('DATE(updated_at)'))
    ->orderBy('updated_at', 'desc')
    ->get();

    return view('AM.am-sales-daily', compact('dailySales'));
    }

    public function getOrdersByDate($date){
    
    $orders = Orders::with('user')->whereDate('updated_at', $date)->where('status','Delivered')->get();
    return view('AM.am-sales-daily-details', compact('orders','date'));

    }

    public function showMonthlySales()
    {
        $expenses = Expenses::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(amount) as total_expense')
            ->groupBy(DB::raw('MONTH(date), YEAR(date)'))
            ->get();
    
        // Retrieve monthly sales and total orders for delivered orders
        $monthlySales = Orders::selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, SUM(total_price) as total_sales, COUNT(*) as total_orders')
            ->where('status', 'Delivered')
            ->groupBy(DB::raw('MONTH(updated_at), YEAR(updated_at)'))
            ->get();
    
        // Initialize a collection to store combined data
        $monthlyData = collect();
    
        // Combine expenses and sales data by month and year
        foreach ($expenses as $expense) {
            $monthlyData->push([
                'year' => $expense->year,
                'month' => $expense->month,
                'total_expense' => $expense->total_expense,
                'total_sales' => 0, // Default to 0, will be updated if matching sales data exists
                'total_orders' => 0 // Default to 0
            ]);
        }
    
        foreach ($monthlySales as $sale) {
            // Find the existing entry in the monthlyData collection
            $existingEntryIndex = $monthlyData->search(function ($item) use ($sale) {
                return $item['year'] == $sale->year && $item['month'] == $sale->month;
            });
    
            if ($existingEntryIndex !== false) {
                // Update the existing entry with total sales and orders
                $existingEntry = $monthlyData->get($existingEntryIndex);
                $existingEntry['total_sales'] = $sale->total_sales;
                $existingEntry['total_orders'] = $sale->total_orders;
                // Replace the existing entry in the collection
                $monthlyData->put($existingEntryIndex, $existingEntry);
            } else {
                // Add a new entry if no matching month/year found in expenses
                $monthlyData->push([
                    'year' => $sale->year,
                    'month' => $sale->month,
                    'total_expense' => 0, // Default to 0 if no expenses for this month/year
                    'total_sales' => $sale->total_sales,
                    'total_orders' => $sale->total_orders,
                ]);
            }
        }
    
        // Sort the collection by year and month
        $monthlyData = $monthlyData->sortBy(['year', 'month'])->values();
        return view('AM.am-sales-monthly', compact('monthlyData'));
    }

    public function showMonthlyDetails(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
    
    
        $totalSales = Orders::whereYear('updated_at', $year)
            ->whereMonth('updated_at', $month)
            ->where('status', 'Delivered')
            ->sum('total_price');
    

        $totalExpenses = Expenses::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');

        $netIncomeProfit = $totalSales - $totalExpenses;
    
        return view('AM.am-sales-monthly-details', compact('totalSales', 'totalExpenses', 'netIncomeProfit', 'month', 'year'));
    }

    public function showAnnualSales()
    {
        $expenses = Expenses::selectRaw('YEAR(date) as year, SUM(amount) as total_expense')
            ->groupBy(DB::raw('YEAR(date)'))
            ->get();
    
        // Retrieve monthly sales and total orders for delivered orders
        $annualSales = Orders::selectRaw('YEAR(updated_at) as year, SUM(total_price) as total_sales, COUNT(*) as total_orders')
            ->where('status', 'Delivered')
            ->groupBy(DB::raw('YEAR(updated_at)'))
            ->get();
    
        // Initialize a collection to store combined data
        $annualData = collect();
    
        // Combine expenses and sales data by month and year
        foreach ($expenses as $expense) {
            $annualData->push([
                'year' => $expense->year,
                'total_expense' => $expense->total_expense,
                'total_sales' => 0, // Default to 0, will be updated if matching sales data exists
                'total_orders' => 0 // Default to 0
            ]);
        }
    
        foreach ($annualSales as $sale) {
            // Find the existing entry in the monthlyData collection
            $existingEntryIndex = $annualData->search(function ($item) use ($sale) {
                return $item['year'] == $sale->year;
            });
    
            if ($existingEntryIndex !== false) {
                // Update the existing entry with total sales and orders
                $existingEntry = $annualData->get($existingEntryIndex);
                $existingEntry['total_sales'] = $sale->total_sales;
                $existingEntry['total_orders'] = $sale->total_orders;
                $annualData->put($existingEntryIndex, $existingEntry);
            } else {
                // Add a new entry if no matching month/year found in expenses
                $annualData->push([
                    'year' => $sale->year,
                    'total_expense' => 0,
                    'total_sales' => $sale->total_sales,
                    'total_orders' => $sale->total_orders,
                ]);
            }
        }
    
        $annualData = $annualData->sortBy(['year'])->values();
        return view('AM.am-sales-annually', compact('annualData'));
    }

    public function generatePdf()
{

    $expenses = Expenses::selectRaw('MONTH(date) as month, YEAR(date) as year, SUM(amount) as total_expense')
    ->groupBy(DB::raw('MONTH(date), YEAR(date)'))
    ->get();

// Retrieve monthly sales and total orders for delivered orders
$monthlySales = Orders::selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, SUM(total_price) as total_sales, COUNT(*) as total_orders')
    ->where('status', 'Delivered')
    ->groupBy(DB::raw('MONTH(updated_at), YEAR(updated_at)'))
    ->get();

// Initialize a collection to store combined data
$monthlyData = collect();

// Combine expenses and sales data by month and year
foreach ($expenses as $expense) {
    $monthlyData->push([
        'year' => $expense->year,
        'month' => $expense->month,
        'total_expense' => $expense->total_expense,
        'total_sales' => 0, // Default to 0, will be updated if matching sales data exists
        'total_orders' => 0 // Default to 0
    ]);
}

foreach ($monthlySales as $sale) {
    // Find the existing entry in the monthlyData collection
    $existingEntryIndex = $monthlyData->search(function ($item) use ($sale) {
        return $item['year'] == $sale->year && $item['month'] == $sale->month;
    });

    if ($existingEntryIndex !== false) {
        // Update the existing entry with total sales and orders
        $existingEntry = $monthlyData->get($existingEntryIndex);
        $existingEntry['total_sales'] = $sale->total_sales;
        $existingEntry['total_orders'] = $sale->total_orders;
        // Replace the existing entry in the collection
        $monthlyData->put($existingEntryIndex, $existingEntry);
    } else {
        // Add a new entry if no matching month/year found in expenses
        $monthlyData->push([
            'year' => $sale->year,
            'month' => $sale->month,
            'total_expense' => 0, // Default to 0 if no expenses for this month/year
            'total_sales' => $sale->total_sales,
            'total_orders' => $sale->total_orders,
        ]);
    }
}

// Sort the collection by year and month
$monthlyData = $monthlyData->sortBy(['year', 'month'])->values();
    
    $pdf = Pdf::loadView('AM.am-monthly-report', compact('monthlyData'));
    return $pdf->stream('monthly-report.pdf');
}



public function generatePdfDailySales(){

    $dailySales = Orders::selectRaw('DATE(updated_at) as date, SUM(total_price) as total_sales, COUNT(*) as total_orders')
    ->where('status', 'Delivered')
    ->groupBy(DB::raw('DATE(updated_at)'))
    ->get();

    $pdf = Pdf::loadView('AM.am-daily-report', compact('dailySales'));
    return $pdf->stream('daily-report.pdf');

}


public function generatePdfAnnualSales(){

    $expenses = Expenses::selectRaw('YEAR(date) as year, SUM(amount) as total_expense')
    ->groupBy(DB::raw('YEAR(date)'))
    ->get();

// Retrieve monthly sales and total orders for delivered orders
$annualSales = Orders::selectRaw('YEAR(updated_at) as year, SUM(total_price) as total_sales, COUNT(*) as total_orders')
    ->where('status', 'Delivered')
    ->groupBy(DB::raw('YEAR(updated_at)'))
    ->get();

// Initialize a collection to store combined data
$annualData = collect();

// Combine expenses and sales data by month and year
foreach ($expenses as $expense) {
    $annualData->push([
        'year' => $expense->year,
        'total_expense' => $expense->total_expense,
        'total_sales' => 0, // Default to 0, will be updated if matching sales data exists
        'total_orders' => 0 // Default to 0
    ]);
}

foreach ($annualSales as $sale) {
    // Find the existing entry in the monthlyData collection
    $existingEntryIndex = $annualData->search(function ($item) use ($sale) {
        return $item['year'] == $sale->year;
    });

    if ($existingEntryIndex !== false) {
        // Update the existing entry with total sales and orders
        $existingEntry = $annualData->get($existingEntryIndex);
        $existingEntry['total_sales'] = $sale->total_sales;
        $existingEntry['total_orders'] = $sale->total_orders;
        $annualData->put($existingEntryIndex, $existingEntry);
    } else {
        // Add a new entry if no matching month/year found in expenses
        $annualData->push([
            'year' => $sale->year,
            'total_expense' => 0,
            'total_sales' => $sale->total_sales,
            'total_orders' => $sale->total_orders,
        ]);
    }
}

$annualData = $annualData->sortBy(['year'])->values();
$pdf = Pdf::loadView('AM.am-annual-report', compact('annualData'));
return $pdf->stream('annual-report.pdf');


}

}