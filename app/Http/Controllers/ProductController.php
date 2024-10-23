<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Products::all();
        return view('AM.am-items', compact('categories','products'));
    }

    public function productStore(Request $request){

        if($request->has('submit')){
            $name = $request->input('name');
            $price = $request->input('price');
            $description = $request->input('description');
            $quantity = $request->input('quantity');
            $size= $request->input('size');
            $category_id = $request->input('category_id');
            if ($request->hasFile('product_image')) {
                $picture = $request->file('product_image');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Product image must be an image (jpg, png, jpeg).');
                }

                $product_image = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(300, 300);
                $image->save(public_path('storage/productPictures/' . $product_image), 100);


            } else {
                $product_image = null;
            }
    
           
            $existingProduct = Category::where('name', $name)->first();
            if ($existingProduct) {
                return redirect()->back()->with('error', 'Product ' . $name . ' is already in records!');
            }
            $data = [
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'quantity' => $quantity,
                'size' => $size,
                'category_id' => $category_id,
                'product_image' => $product_image, 
            ];

            $product = Products::create($data);
            if ($product) {
                return redirect()->back()->with('success', 'Product added successfully!');
            } else {
                return redirect()->back()->with('error', 'Unable to add Product!');
            }
        }
        return redirect()->back()->with('error', 'Form submission error!');

    }

    public function viewProduct(String $id){
        $product = Products::findOrFail($id);
        return view('AM.am-items-details', compact('product'));

    }

}
