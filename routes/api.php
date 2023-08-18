<?php

use Illuminate\Http\Request;
use App\Http\Controllers\api\posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\categories;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\categoriescontroller;

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


Route::group(['middleware' => ['auth:sanctum','lang']], function ()
{
    Route::post('creatPost',[posts::class,'store']);
    Route::delete('DeletePost/{id}',[posts::class,'destroy']);
    Route::post('UpdatePost/{id}',[posts::class,'update']);
    Route::post('/logout',[AuthController::class,'logout']);
});


Route::middleware('lang')->group(function(){

    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    Route::get('posts', [posts::class,'index']);
    Route::get('categories', [categories::class,'index']); //all categories
    Route::get('/show/{show}',[categories::class,'show'])->name('show');

});


