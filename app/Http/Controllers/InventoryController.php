<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\Restock;

class InventoryController extends Controller
{
    public function index(){
        $products = Products::all();
        $stocks = Inventory::with('product')->get();
        return view('AM.am-inventory',compact('products','stocks'));
    }

    public function addStock(Request $request) {
        if ($request->has('submit')) {
            // Validate input
            $request->validate([
                'product_id' => 'required|integer|exists:products,id', // Assuming 'products' is the correct table name
                'quantity' => 'required|integer|min:1',
            ]);
    
            $quantity = $request->input('quantity');
            $product_id = $request->input('product_id');
            
            $existingProduct = Inventory::where('product_id', $product_id)->first();
            if($existingProduct){
                return redirect()->back()->with('error', 'Unable to add in stock, The item already exixt' );
            }
    
            $data = [
                'quantity' => $quantity,
                'product_id' => $product_id, 
            ];


    
            $inventory = Inventory::create($data);
            if ($inventory) {
                Restock::create([
                    'date' => now(),
                    'stock_quantity' => $quantity,
                    'inventory_id' => $inventory->id,
                ]);
                return redirect()->back()->with('success', 'Item added to Inventory Successfully!');
            } else {
                return redirect()->back()->with('error', 'Unable to add Item!');
            }
        }
        return redirect()->back()->with('error', 'Form submission error!');
    }

    public function updateStock(Request $request, String $id){
        $stock = Inventory::with('product')->findOrFail($id);
        if($request->has('submit')){
            $product_id = $request->input('product_id');
            $old_quantity = $stock->quantity;
            $quantity = $request->input('quantity');
        
            $new_quantity = $quantity - $old_quantity;

            $stock->product_id = $product_id;
            $stock->quantity = $quantity;
            Restock::create([
                'date' => now(),
                'stock_quantity' => $new_quantity,
                'inventory_id' => $stock->id,
            ]);
            $stock->save();
            return redirect()->back()->with('success', 'Item updated successfully');
        }
    }

    public function stockDelete(String $id){
        $stock = Inventory::findOrFail($id);
        $stock->delete();
        return redirect()->back()->with('success', 'Item deleted successfully');
    }
    
}
