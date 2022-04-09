<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\blogController;

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

//Authentication
Route::post('/register',[ UserAuthController::class,'register']);
Route::post('/login',[ UserAuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    //Blogs
    Route::get('/create-blog',[ blogController::class,'createBlog']);
    Route::get('/get-blogs-list',[ blogController::class,'getBlogsList']);
});

