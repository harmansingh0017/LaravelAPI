<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;

use GuzzleHttp\Client;



class SupplierController extends Controller
{
    public function index()
    {
    $suppliers = Supplier::all();
    return response()->json([
    "suppliers" => $suppliers
    ], 200);
    }
    public function show1($id){
        $suppliers = Supplier::findOrFail($id);
 
       return response()->json([
       "suppliers" => $suppliers
        ], 200);
   }

    public function show($email , $password){
     $supplier = Supplier::where('email', $email )->where('password', $password)->first();
        return response()->json([
       "suppliers" => $supplier
       ], 200);
   }

    public function store(Request $request)
    {
           $supplier = Supplier::create([
            "suppliername" => $request->suppliername,
            "email" => $request->email,
            "password" => $request->password,
            "company" => $request->company,
            "catogery_id" => $request->catogery_id,
            "phone" => $request->phone,
            "address" => $request->address,

             ]);
            return response()->json([
            "supplier" => $supplier
            ], 200);
    }


    public function delete(Request $request)
    {
    $supplier = Supplier::whereId($request->id)->first();
    
    $supplier->delete();
    
    return response(200);
    }

    public function update()
    {
        $supplier = Supplier::findOrFail(request('id'));
        $supplier->suppliername = request('suppliername');
        $supplier->email = request('email');
        $supplier->password = request('password');
        $supplier->company = request('company');
        $supplier->catogery_id = request('catogery_id');
        $supplier->phone = request('phone');
        $supplier->address = request('address');
        $supplier->id = request('id');
  
  
    
        $supplier->save();
    
     return response(200);
    }

    public function complete(Request $request)
    {
    $supplier = Supplier::whereId($request->id)->first();
    if(!is_null($supplier)){
    $supplier->completed = !$supplier->completed;
    $supplier->save();
    }
    return response(200);
    }

}
