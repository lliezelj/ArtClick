<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Artists;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::withCount('products')->get();
        return view('AM.am-items-category', compact('categories'));
    }

    public function getProductsByCategory($id)
    {
        $products = Products::where('category_id', $id)->get();
        $categories = Category::all();
        $artists = Artists::all();
        return view('AM.am-items',compact('categories','products','artists'));
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

    public function update( Request $request, String $id){

        $category = Category::findOrFail($id);
            $name = $request->input('name');
            $existingCategory = Category::where('name', $name)
            ->where('id', '!=', $id)->first();
            if ($existingCategory) {
            return redirect()->back()->with('error', 'Category ' . $name . ' already exists!');
            }
            $category->name = $name;

            if ($request->hasFile('image')) {
                $picture = $request->file('image');
                $ext = $picture->getClientOriginalExtension();
        
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Image must be an (jpg, png, jpeg) format');
                }
                $image = $picture->getClientOriginalName();
                $picture->move('storage/categoryPictures', $image);
        
                $category->image = $image;
            }
            $category->save();
            return redirect()->back()->with('success', 'Category updated successfully');
        }

        public function delete(String $id){
            $category = Category::findOrFail($id);
            $name = $category->name;  
            $category->delete();
            return redirect()->back()->with('success', 'Category' .$name .' deleted  successfully');
            
        }
}
