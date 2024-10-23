<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('AM.am-items-category', compact('categories'));
    }

    public function getProductsByCategory($id)
    {
        $products = Products::where('category_id', $id)->get();
        return response()->json($products);
    }



    public function categoryStore(Request $request){
        if ($request->has('submit')) {
            $name = $request->input('name');
            if ($request->hasFile('image')) {
                $picture = $request->file('image');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Image must be an image (jpg, png, jpeg).');
                }

                $profile_img = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(300, 300);
                $image->save(public_path('storage/categoryPictures/' . $profile_img), 100);


            } else {
                $profile_img = null;
                // return redirect()->back()->with('error', 'Profile picture is required.');
            }
    
           
            $existingCategory = Category::where('name', $name)->first();
            if ($existingCategory) {
                return redirect()->back()->with('error', 'Category ' . $name . ' is already in records!');
            }
            $data = [
                'name' => $name,
                'image' => $profile_img, 
            ];


            $category = Category::create($data);
            if ($category) {
                return redirect()->back()->with('success', 'Category added successfully!');
            } else {
                return redirect()->back()->with('error', 'Unable to add Category!');
            }
        }
        return redirect()->back()->with('error', 'Form submission error!');
    }
}
