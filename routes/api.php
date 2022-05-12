<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//for products

Route::get('products', "ProductsController@index");
Route::get('products/view', "ProductsController@viewindex");
Route::get('products/supplier/{id}', "ProductsController@indexsupplier");
Route::post('products', "ProductsController@store");
Route::post('products/delete/{id}', "ProductsController@delete");


//for demo
Route::get('/products/{id}', 'ProductsController@show');
Route::post('reviews', "ReviewContoller@store");









Route::get('/products/reviews/{id}', 'ProductsController@reviews');
Route::get('/products/catogories/{id}', 'ProductsController@catogories');

Route::post('/products/update', 'ProductsController@update');




//for reviews
Route::get('reviews', "ReviewContoller@index");
Route::post('reviews/delete', "ReviewContoller@delete");
Route::get('/reviews/{id}', 'ReviewContoller@show');



// for category
Route::get('catogery', "CatogeryController@index");
Route::post('catogery', "CatogeryController@store");
Route::post('catogery/delete', "CatogeryController@delete");
Route::get('/catogery/{id}', 'CatogeryController@show');



//for suppliers
Route::get('suppliers', "SupplierController@index");
Route::post('suppliers', "SupplierController@store");
Route::post('suppliers/delete/{id}', "SupplierController@delete");
Route::get('/suppliers/{email}/{password}', 'SupplierController@show');
Route::get('/suppliers/{id}', 'SupplierController@show1');
Route::post('/suppliers/update', 'SupplierController@update');


