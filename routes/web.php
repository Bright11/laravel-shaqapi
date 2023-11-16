<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\frontend\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('',[PageController::class,'index'])->name('index');
Route::get('invoice',[PageController::class,'invoice'])->name('invoice');


Route::get('login',[PageController::class,'login'])->name('login');
Route::post('weblogin',[AuthController::class,'weblogin'])->name('weblogin');

// Route::get('customeritem/{id}',[ProductController::class,'customeritem']);


