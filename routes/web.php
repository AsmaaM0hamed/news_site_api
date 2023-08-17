<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/', function () {
            return view('welcome');
        });



        Route::get('writer/dashboard', function () {
            return view('dashboard.writer.board');
        })->middleware(['auth', 'verified'])->name('writer/dashboard');

// ###################  categories  #######################
        Route::resource('categories',CategorieController::class);

// ################### posts ################

        Route::resource('posts',PostController::class);


        require __DIR__.'/auth.php';
    });
