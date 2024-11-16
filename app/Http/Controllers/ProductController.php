<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Artists;
use App\Models\Reviews;
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
            $size= $request->input('size');
            $category_id = $request->input('category_id');
            $artist_id = $request->input('artist_id');
            $frame = $request->input('frame');

            if ($request->hasFile('product_image')) {
                $picture = $request->file('product_image');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Product image must be an image (jpg, png, jpeg).');
                }

                $product_image = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(1000, 1000);
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
                'size' => $size,
                'category_id' => $category_id,
                'artist_id' => $artist_id,
                'frame' => $frame,
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

    public function updateProduct(Request $request, String $id){
        $product = Products::findOrFail($id);

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $size = $request->input('size');
        $category_id = $request->input('category_id');
        $artist_id = $request->input('artist_id');
        $frame = $request->input('frame');

        $existingProduct = Products::where('name', $name)
        ->where('id', '!=', $id)->first();
        if($existingProduct){
            return redirect()->back()->with('error', 'Product' . $name. 'already exist');
        }

        $product->name = $name;
        if ($request->hasFile('product_image')) {
            $picture = $request->file('product_image');
            $ext = $picture->getClientOriginalExtension();
    
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', 'Image must be an (jpg, png, jpeg) format');
            }
              $product_image = time() . '_' . $picture->getClientOriginalName();
              $image = Image::make($picture->getRealPath())->fit(1000, 1000);
              $image->save(public_path('storage/productPictures/' . $product_image), 100);

             $product->product_image = $product_image;
        }

            $product->price = $price;
            $product->description = $description;
            $product->size = $size;
            $product->category_id = $category_id;
            $product->artist_id = $artist_id;
            $product->frame = $frame;


        $product->save();
        return redirect()->back()->with('success', 'Product updated successfully');

    }

    public function deleteProduct(String $id){
        $product = Products::findOrFail($id);
        $name = $product->name;
        $product->delete();
        return redirect()->back()->with('success', 'Item ' . $name . ' deleted successfully!');
    }

    public function search(Request $request)
{
    $search = $request->input('search');
    $categories = Category::all();
    $artists = Artists::all();

    // Fetch the products
    $query = Products::query()
        ->join('category', 'products.category_id', '=', 'category.id')
        ->join('artists', 'products.artist_id', '=', 'artists.id')
        ->select('products.*', 'category.name as category_name', 'artists.lastname', 'artists.firstname')
        ->orderBy('products.name', 'ASC');
    
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('products.name', 'LIKE', '%' . $search . '%')
              ->orWhere('category.name', 'LIKE', '%' . $search . '%')
              ->orWhere('products.price', 'LIKE', '%' . $search . '%')
              ->orWhere('products.description', 'LIKE', '%' . $search . '%')
              ->orWhere('artists.lastname', 'LIKE', '%' . $search . '%')
              ->orWhere('artists.firstname', 'LIKE', '%' . $search . '%');
        });
    }

    $products = $query->get(); 

    if ($products->isEmpty()) {
        return redirect()->back()->with('error', 'No results found for your search.');
    }

    // Prepare reviews data
    $reviewsData = [];
    foreach ($products as $product) {
        $reviewsCount = Reviews::where('product_id', $product->id)->count();
        $averageRating = $reviewsCount > 0 
            ? Reviews::where('product_id', $product->id)->sum('rating_percentage') / $reviewsCount 
            : 0;
        
        $reviewsData[$product->id] = [
            'count' => $reviewsCount,
            'average' => $averageRating,
        ];
    }

    return view('customer.search-items', compact('products', 'artists', 'categories', 'reviewsData'));
}

    
}
