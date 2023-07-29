<?php

use App\Http\Controllers\api\categories;
use App\Http\Controllers\api\categoriescontroller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('lang')->group(function(){
    Route::get('categories', [categories::class,'index']); //all categories
    Route::get('/show/{show}',[categories::class,'show'])->name('show');

});


