<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Restock;
use App\models\Invetory;

class RestockController extends Controller
{
    public function index(){
        $restocks = Restock::with('inventory')->get()->groupBy('date');
        return view('AM.am-restock', compact('restocks'));
    }

    public function restockDetails($date)
{
    $restocks = Restock::whereDate('date', $date)->with('inventory')->get();
    return view('AM.am-restock-details', compact('restocks', 'date'));
}

}