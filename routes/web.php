<?php


use App\Http\Controllers\SubscriptionController;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use App\Mail\Subscribed;
use App\Models\Category;
use App\Mail\NewsLetterMail;
use App\Http\Requests\SubscribeUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\NewsLetterController;

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

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/post/{slug}', [FrontendController::class, 'singlePost'])->name('post.single');
Route::get('/category/{category}', [FrontendController::class, 'category'])->name('category.single');
Route::get('/tag/{tag}', [FrontendController::class, 'tag'])->name('tag.single');
Route::get('/results', function () {
    $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results', [
        'categories' => Category::take(5)->get(),
        'tags' => Tag::all(),
        'posts' => $posts,
        'title' => 'Search results: ' . request('query'),
        'settings' => Setting::first()
    ]);
});

Route::get(
    '/subscribe',
    [SubscriptionController::class, 'subscribe']
);


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

    Route::resource('profile', ProfileController::class);

    Route::resource('settings', SettingsController::class);
    Route::resource('newsletters', NewsLetterController::class);


});
