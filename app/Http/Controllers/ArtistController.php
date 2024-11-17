<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;
use App\Models\Products;
use App\Models\Category;
use App\Models\Reviews;
use Intervention\Image\Facades\Image;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artists::withCount('artworks')->get();
        return view('AM.am-artist',compact('artists'));
    }
    public function gallery(){
        $artists = Artists::withCount('artworks')->get();
        return view('customer.gallery',compact('artists'));
    }

    public function getArtworksByArtists($id)
    {
        $artworks = Products::where('artist_id', $id)->get();
        $artists = Artists::all();
        $theArtist = Artists::select('lastname', 'firstname')->where('id', $id)->first();
        $categories = Category::all();
        return view('AM.am-artist-artworks',compact('artists','artworks','categories','theArtist'));
    }

    public function getItemsByArtists($id)
    {

        $artworks = Products::with('category')->where('artist_id', $id)->get();
        $artists = Artists::all();
        $theArtist = Artists::select('lastname', 'firstname')->where('id', $id)->first();
        $categories = Category::all();

        $reviewsData = []; 
    
       foreach ($artworks as $product) {
        $reviewsCount = Reviews::where('product_id', $product->id)->count();
        $averageRating = $reviewsCount > 0 
            ? Reviews::where('product_id', $product->id)->sum('rating_percentage') / $reviewsCount 
            : 0;
        
        $reviewsData[$product->id] = [
            'count' => $reviewsCount,
            'average' => $averageRating,
        ];
    }
        return view('customer.gallery-items',compact('artists','artworks','categories','theArtist','reviewsData'));
    }

    public function storeArtist(Request $request){

        if($request->has('submit')){
            $lastname = $request->input('lastname');
            $firstname = $request->input('firstname');
            $tribe = $request->input('tribe');

            if ($request->hasFile('artist_image')) {
                $picture = $request->file('artist_image');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Artist image must be an image (jpg, png, jpeg).');
                }

                $artist_image = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(540, 560);
                $image->save(public_path('storage/artistPictures/' . $artist_image), 100);


            } else {
                $artist_image = null;
            }

            $existingArtist = Artists::where('lastname', $lastname)
            ->where('firstname', $firstname)
            ->first();

            if ($existingArtist) {
            return redirect()->back()->with('error', 'Artist ' . $lastname . ', ' . $firstname . ' is already in records!');
            }

            $data = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'tribe' => $tribe,
                'artist_image' => $artist_image, 
            ];

            $artist = Artists::create($data);
            if ($artist) {
                return redirect()->back()->with('success', 'Artist ' . $lastname . ', ' .$firstname. ' added successfully!');
            } else {
                return redirect()->back()->with('error', 'Unable to add Artist!');
            }
        }
        return redirect()->back()->with('error', 'Form submission error!');
    }

    public function updateArtist( Request $request, String $id){

            $artist = Artists::findOrFail($id);
            $lastname = $request->input('lastname');
            $firstname = $request->input('firstname');
            $tribe = $request->input('tribe');

            $existingArtist = Artists::where('lastname', $lastname)
            ->where('firstname', $firstname)
            ->where('id', '!=', $id)->first();
            if ($existingArtist) {
            return redirect()->back()->with('error', 'Artist ' . $lastname . ', ' . $firstname . ' is already in records!');
            }

            if ($request->hasFile('artist_image')) {
                $picture = $request->file('artist_image');
                $ext = $picture->getClientOriginalExtension();
        
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Image must be an (jpg, png, jpeg) format');
                }
              
                $artist_image = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(540, 560);
                $image->save(public_path('storage/artistPictures/' . $artist_image), 100);
        
                $artist->artist_image = $artist_image;
            }
            $artist->lastname = $lastname;
            $artist->firstname = $firstname;
            $artist->tribe = $tribe;

            $artist->save();
            return redirect()->back()->with('success', 'Artist updated successfully');
        }

        public function deleteArtist(String $id){
            $artist = Artists::findOrFail($id);
            $lastname = $artist->lastname;  
            $firstname = $artist->firstname;
            $artist->delete();
            return redirect()->back()->with('success', 'Artist ' . $lastname . ', ' . $firstname . ' deleted  successfully');
            
        }
}
