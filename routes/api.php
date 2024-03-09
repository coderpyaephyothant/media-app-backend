<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\PostApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('user/category-data',function(){
    return response()->json('this is category-data api');
})->middleware('auth:sanctum');

// to get post news without middleware
Route::get('user/new-posts',[PostApiController::class,'getNewPosts']);
