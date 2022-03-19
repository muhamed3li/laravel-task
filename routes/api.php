<?php

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\PostApiController;
use App\Http\Controllers\UserApiController;
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

Route::get('posts',[PostApiController::class,'index']);
Route::post('post',[PostApiController::class,'store']);
Route::get('posts/{id}',[PostApiController::class,'show']);
Route::post('posts/{post}',[PostApiController::class,'update']);
Route::delete('posts/{id}',[PostApiController::class,'destroy']);

Route::get('categories',[CategoryApiController::class,'index']);
Route::post('category',[CategoryApiController::class,'store']);
Route::get('categories/{id}',[CategoryApiController::class,'show']);
Route::post('categories/{category}',[CategoryApiController::class,'update']);
Route::delete('categories/{id}',[CategoryApiController::class,'destroy']);

Route::get('users',[UserApiController::class,'index']);
Route::post('user',[UserApiController::class,'store']);
Route::get('users/{id}',[UserApiController::class,'show']);
Route::post('users/{user}',[UserApiController::class,'update']);
Route::delete('users/{id}',[UserApiController::class,'destroy']);
