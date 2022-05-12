<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topproducts;
use App\Topsuppliers;


class AllController extends Controller
{
    public function productsviewindex()
    {
         $products = Topproducts::all();
         return response()->json([
         "productsview" => $products
          ], 200);
    }

    public function suppliersviewindex()
    {
        $supplier = Topsuppliers::all();
        return response()->json([
        "suppliersview" => $supplier
         ], 200);
    }

}
