<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\frontend\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::resource('/item',ProductController::class);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/update/{id}',[ProductController::class,'update']);

    Route::delete('destroy/{id}',[ProductController::class,'destroy']);

    Route::get('/customeritem/{id}',[ProductController::class,'customeritem']);
});
