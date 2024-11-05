<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
 

    public function index() {
        $expenses = Expenses::selectRaw('YEAR(date) as expense_year, MONTH(date) as expense_month, SUM(amount) as expense_amount')
            ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
            ->get();
    
        return view('AM.am-expenses', compact('expenses'));
    }

    public function showExpenseByYearMonth($year, $month)
    {
        $myExpenses = Expenses::whereYear('date', $year)
                            ->whereMonth('date', $month)
                            ->get();
        return view('AM.am-expenses-details', compact('myExpenses', 'year', 'month'));
    }
    

    public function addExpense(Request $request){
        if($request->has('submit')){
        $date = $request->input('date');
        $amount = $request->input('amount');
        $expense_name = $request->input('expense_name');
        
        if ($request->hasFile('expense_image')) {
            $picture = $request->file('expense_image');
            $ext = $picture->getClientOriginalExtension();

            // Validate file extension
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', 'Expense image must be an image (jpg, png, jpeg).');
            }

            $expense_image = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('storage/expensesPictures'), $expense_image);


        } else {
            $expense_image = null;
        }

        $data = [
            'date' => $date,
            'amount' => $amount,
            'expense_name' => $expense_name,
            'expense_image' => $expense_image, 
        ];

        $expense = Expenses::create($data);
        if ($expense) {
            return redirect()->back()->with('success', 'Expense ' . $expense_name . ' added successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to add Expense!');
        }
        }
        return redirect()->back()->with('error', 'Form submission error!');
    }

    public function editExpense(Request $request, String $id){
    
    
    if ($request->has('submit')){
    $expenses = Expenses::findOrFail($id);
    $date = $request->input('date');
    $amount = $request->input('amount');
    $expense_name = $request->input('expense_name');
    
    if ($request->hasFile('expense_image')) {
        $picture = $request->file('expense_image');
        $ext = $picture->getClientOriginalExtension();

        if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
            return redirect()->back()->with('error', 'Expense Image must be an (jpg, png, jpeg) format');
        }
      
        $expense_image = time() . '_' . $picture->getClientOriginalName();
        $picture->move(public_path('storage/expensesPictures'), $expense_image);

        $expenses->expense_image = $expense_image;
    }
        $expenses->date = $date;
        $expenses->amount = $amount;
        $expenses->expense_name = $expense_name;

        $expenses->save();
        return redirect()->back()->with('success', 'Expense ' .$expense_name. ' updated successfully');

    }


    }

    public function deleteExpense(String $id){
        $expense = Expenses::findOrFail($id);
        $expense_name = $expense->expense_name;
        $expense->delete();
        return redirect()->back()->with('success', ''.$expense_name. ' expense deleted successfully');
    }
}
