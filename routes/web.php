<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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


    Route::get('/', [HomeController::class, 'show']);
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('search',[HomeController::class,'search'])->name('search');







Route::middleware(['auth'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/posts' ,PostController::class)->except(['show']);
    Route::resource('/categories' ,CategoryController::class);
});


