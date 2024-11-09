<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Reviews;

class ReviewsController extends Controller
{
    public function addToReview(Request $request){
    
        if($request->has('submit')){
            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $rating_percentage = $request->input('rating_percentage');
            $comment = $request->input('comment');

            $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'rating_percentage' => $rating_percentage,
            'comment' => $comment
            ];

            $review = Reviews::create($data);
            if($review){
                return redirect()->back()->with('success', 'Thank you for reviewing our product!');
            }
        }
        return redirect()->back()->with('error', 'error submission form!');
    }
}
