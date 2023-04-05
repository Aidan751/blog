<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard', [
            'posts' => Post::all(),
            'trashedPosts' => Post::onlyTrashed()->get(),
            'users' => User::all(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
