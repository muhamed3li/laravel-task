<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/posts' ,PostController::class)->except(['show']);
    Route::resource('/categories' ,CategoryController::class);
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::post('/users/{user}/make-admin',[UserController::class,'makeAdmin'])->name('users.make-admin');
    Route::post('/users/{user}/make-user',[UserController::class,'makeUser'])->name('users.make-user');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
});

Auth::routes();

Route::get('/', [HomeController::class, 'show']);
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('search',[HomeController::class,'search'])->name('search');
Route::get('/home', [HomeController::class, 'index'])->name('home');





