<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FindOrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StreamController;
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

//common
Route::get('/', [PageController::class, 'index'])->name('home');

//auth
Route::get('/login', [AuthController::class, 'handle'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth', [AuthController::class, 'show'])->middleware('auth');

//models
Route::resource('users', UserController::class);
Route::resource('teammates', FindOrderController::class);
Route::resource('streams', StreamController::class)->scoped([
    'stream' => 'name',
]);
Route::resource('news', NewsController::class)->scoped([
    'news' => 'slug',
]);

//additional
Route::resource('{type}/{slug}/comments', CommentController::class);
Route::resource('{type}/{slug}/rating', RatingController::class);
