<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Catogery;

class CatogeryController extends Controller
{
    public function index()
    {
    $categories = Catogery::all();
    return response()->json([
    "catogery" => $categories
    ], 200);
    }
    
    public function show($id){
        $categories = Catogery::findOrFail($id);
       return response()->json([
       "categories" => $categories
       ], 200);
   }

    public function store(Request $request)
    {
    $category = Category::create([
    "content" => $request->content,
    "completed" => false
    ]);
    return response()->json([
    "category" => $category
    ], 200);
    }


    public function delete(Request $request)
    {
    $category = Category::whereId($request->id)->first();
    if(!is_null($category)){
    $category->delete();
    }
    return response(200);
    }


    public function complete(Request $request)
    {
    $category = Category::whereId($request->id)->first();
    if(!is_null($category)){
    $category->completed = !$category->completed;
    $category->save();
    }
    return response(200);
    }

}
