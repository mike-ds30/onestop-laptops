<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [WebController::class, 'home']);
Route::post('/changelang/{locale}', [WebController::class, 'change_language']);
Route::get('/brands', [BrandController::class, 'display_all_brands']);
Route::get('/brands/{id}', [BrandController::class, 'display_brand_products']);
Route::get('/products', [LaptopController::class, 'display_all_products']);
Route::get('/products/{id}', [LaptopController::class, 'laptop_detail']);
Route::post('/addtocart/{id}', [CartController::class, 'add_to_cart'])->middleware('membermiddleware');
Route::get('/cart', [CartController::class, 'cart'])->middleware('membermiddleware');
Route::get('/deletefromcart/{id}', [CartController::class, 'delete_from_cart'])->middleware('membermiddleware');
Route::get('/checkout', [TransactionController::class, 'complete_transaction'])->middleware('membermiddleware');
Route::get('/profile', [TransactionController::class, 'view_profile'])->middleware('usermiddleware');
Route::get('/accessadmin', [AdminController::class, 'access_admin_mode'])->middleware('adminmiddleware');
Route::get('/exitadmin', [AdminController::class, 'exit_admin_mode'])->middleware('adminmiddleware');
Route::get('/addbrand', [BrandController::class, 'add_brand'])->middleware('adminmiddleware');
Route::post('/addbrand', [BrandController::class, 'insert_brand'])->middleware('adminmiddleware');
Route::get('editbrand', [BrandController::class, 'edit_brand_page'])->middleware('adminmiddleware');
Route::get('editbrand/{id}', [BrandController::class, 'edit_brand'])->middleware('adminmiddleware');
Route::post('editbrand/{id}', [BrandController::class, 'update_brand'])->middleware('adminmiddleware');
Route::get('deletebrand/{id}', [BrandController::class, 'delete_brand'])->middleware('adminmiddleware');
Route::get('/addproduct', [LaptopController::class, 'add_laptop'])->middleware('adminmiddleware');
Route::post('/addproduct', [LaptopController::class, 'insert_laptop'])->middleware('adminmiddleware');
Route::get('editproduct', [LaptopController::class, 'edit_laptop_page'])->middleware('adminmiddleware');
Route::get('editproduct/{id}', [LaptopController::class, 'edit_laptop'])->middleware('adminmiddleware');
Route::post('/editproduct/{id}', [LaptopController::class, 'update_laptop'])->middleware('adminmiddleware');
Route::get('deleteproduct/{id}', [LaptopController::class, 'delete_laptop'])->middleware('adminmiddleware');
