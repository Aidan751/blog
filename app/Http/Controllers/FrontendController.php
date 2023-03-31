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
            'posts' => Post::orderBy('created_at', 'desc')->skip(1)->take(4)->get(),
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

        $next_id = Post::where('id', '>', $post->id)->min('id');

        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single-post', [
            'post' => $post,
            'settings' => Setting::first(),
            'categories' => Category::take(5)->get(),
            'prev' => Post::find($prev_id),
            'next' => Post::find($next_id),
        ]);
    }

    public function category(Category $category)
    {
        return view('single-category', [
            'category' => $category,
            'settings' => Setting::first(),
            'categories' => Category::take(5)->get(),
            'tags' => Tag::all(),
        ]);
    }
}