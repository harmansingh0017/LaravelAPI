<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Topproducts;
use App\Topsuppliers;







class ProductsController extends Controller
{
      //for demo
    public function show($id){
        $products = Product::findOrFail($id);
        //finding review of a products
        $reviews = Product::find($id)->reviews;
      
        //passing data in json inside response with status ok.
       return response()->json([
       "products" => $products,
       "reviews" => $reviews
       ], 200);
   }

    public function index()
    {
    $products = Product::all();
    return response()->json([
    "products" => $products
    ], 200);
    }
    
    
    public function viewindex()
    {
    $products = Topproducts::all();
    $suppliers = Topsuppliers::all();
    return response()->json([
    "products" => $products,
    "suppliers" => $suppliers

    ], 200);
    }


 
   
    public function reviews($id){
        $reviews = Product::find($id)->reviews;
        return response()->json([
            "reviews" => $reviews
            ], 200);
    }

    public function catogories($id){
        $catogories = Product::where('catogery_id',$id)->get();
        return response()->json([
            "catogories" => $catogories
            ], 200);
    }

    public function store(Request $request)
    {
    $product = Product::create([
    "name" => $request->name,
    "description" => $request->description,
    "brand" => $request->brand,
    "price" => $request->price,
    "discount" => $request->discount,
    "stock" => $request->stock,
    "image" => $request->image,
    "catogery_id" => $request->catogery_id,
    "supplier_id" => $request->supplier_id,
     ]);
    return response()->json([
    "product" => $product
    ], 200);
    }


    public function update()
    {
        $product = Product::findOrFail(request('id'));
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->discount = request('discount');
        $product->image = request('image');
        $product->catogery_id = request('catogery_id');
        $product->brand = request('brand');
        $product->supplier_id = request('supplier_id');
        $product->id = request('id');
  
  
    
        $product->save();
    
     return response(200);
    }
   
    public function delete($id)
    {
    $product = Product::whereId($id)->first();
    if(!is_null($product)){
    $product->delete();
    }
    return response(200);
    }

    public function complete(Request $request)
    {
    $product = Product::whereId($request->id)->first();
    if(!is_null($product)){
    $product->completed = !$product->completed;
    $product->save();
    }
    return response(200);
    }

    public function indexsupplier($id)
    {
        $product = Product::where('supplier_id',$id)->get();
        return response()->json([
            "products" => $product
            ], 200);
    }


   }

