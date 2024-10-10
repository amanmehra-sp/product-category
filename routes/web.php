<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category',  [CategoryController::class , 'add'])->name('catadd');
Route::post('/addCategory',  [CategoryController::class , 'addCategory'])->name('add.cat');

Route::get('/addsubCategory',  [SubCatController::class , 'addsubcat'])->name('subadding');;
Route::post('/storesubcat',  [SubCatController::class , 'storesubcat'])->name('add.subcat');

Route::get('/product',  [ProductController::class , 'productview'])->name('adding');
Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubcategories']);

Route::post('/product',  [ProductController::class , 'productadd'])->name('add.product');

Route::get('/subcategories/{category_id}', [ProductController::class, 'getSubcategories']);


Route::get('/dashboard', [ProductController::class, 'index'])->name('index');;


