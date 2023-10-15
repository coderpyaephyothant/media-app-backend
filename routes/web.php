<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\List\ListController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\TrendPost\TrendPostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profile.index');
    // })->name('dashboard');

    // admin profile
    Route::get('/admin-profile', [ProfileController::class,'index'])->name('admin#profile');
    Route::post('/update', [ProfileController::class,'update'])->name('admin#update');
    Route::get('/change-password', [ProfileController::class,'changePasswrod'])->name('admin#changePassword');
    Route::post('/updated-password', [ProfileController::class,'updatedPasswrod'])->name('admin#updatedPasswrod');
    Route::get('/admin-list', [ListController::class,'index'])->name('admin#list');
    Route::get('/admin-post', [PostController::class,'index'])->name('admin#post');
    Route::get('/admin-trend-post', [TrendPostController::class,'index'])->name('admin#trendPost');
});
