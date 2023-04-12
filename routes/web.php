<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostdetailsController;
use App\Http\Controllers\Adminmiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DetailpostController;
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



Route::get('/', [App\Http\Controllers\Frontend\PostslistController::class, 'index'])->name('post');
Route::get('/frontend/post-detail{post_id}', [App\Http\Controllers\Frontend\PostdetailsController::class, 'index'])->name('post-detail');
Route::get('/admin/post-detail{post_id}', [App\Http\Controllers\Admin\DetailpostController::class, 'index'])->name('post-detail');

Auth::routes();
Route::middleware(['auth','IsAdmin'])->group(function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [DashboardController::class,'index']);


Route::resource('category',CategoryController::class);
Route::resource('post',PostController::class);

});
