<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::delete('posts/kill/{id}', [PostController::class, 'kill'])->name('posts.kill');
    Route::get('posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
    Route::resource('posts', PostController::class);

    Route::resource('tags', TagController::class);


    Route::resource('categories', CategoryController::class);

    // get trashed users
    Route::get('users/trashed', [UserController::class, 'trashed'])->name('users.trashed');

    // restore trashed users
    Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');

    // kill trashed users
    Route::delete('users/kill/{id}', [UserController::class, 'kill'])->name('users.kill');

    // change user permission
    Route::get('users/admin/{id}', [UserController::class, 'permissions'])->name('users.permissions');

    Route::resource('users', UserController::class);

});