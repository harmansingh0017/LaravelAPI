<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;


class ReviewContoller extends Controller
{
    public function index()
    {
    $reviews = Review::all();
    return response()->json([
    "reviews" => $reviews
    ], 200);
    }

    public function show($id){
        $reviews = Review::findOrFail($id);
       return response()->json([
       "reviews" => $reviews
       ], 200);
   }


      //for demo
    public function store()
    {
        $review = Review::create([
            "review" => request('review'),
            "product_id" => request('product_id'),
            "username" => request('username')

             ]);
            return response()->json([
            "review" => $review
            ], 200);
    }





    public function delete($id)
    {
    $review = Review::whereId($id)->first();
    if(!is_null($review)){
    $review->delete();
    }
    return response(200);
    }


    public function complete(Request $request)
    {
    $review = Review::whereId($request->id)->first();
    if(!is_null($review)){
    $review->completed = !$review->completed;
    $review->save();
    }
    return response(200);
    }

}
