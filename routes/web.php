<?php

use App\Category;
use App\Http\Controllers\ProductController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('categories');
    return view('welcome');
});

Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');

Route::get('/products/{product}', 'ProductController@show');
Route::put('/products/{product}', 'ProductController@update');
Route::delete('/products/{product}', 'ProductController@destroy');

Route::get('/categories', function () {
    $categories = Category::orderBy('name')->get();
    return CategoryResource::collection($categories);
});
