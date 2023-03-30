<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('welcome', [
            'categories' => Category::take(5)->get(),
            'tags' => Tag::all(),
            'posts' => Post::orderBy('created_at', 'desc')->skip(1)->take(3)->get(),
            'top_post' => Post::latest()->first(),
            'settings' => Setting::first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();


        return view('single-post', [
            'post' => $post,
            'settings' => Setting::first(),
            'categories' => Category::take(5)->get(),
        ]);
    }
}