<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() === 0) {
            return redirect(route('categories.create'))->with('info', 'Create a category before creating a post');
        } elseif ($tags->count() === 0) {
            return redirect(route('tags.create'))->with('info', 'Create a tag before creating a post');
        } else {
            return view('admin.posts.create', ['categories' => $categories, 'tags' => Tag::all()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CreatePostRequest $request)
    {
        // upload image
        $imageName = time() . $request->featured->extension();
        $featured = $request->featured->storeAs('posts', $imageName);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category,
            'featured' => 'storage/' . $featured,
            'user_id' => auth()->user()->id
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect(route('posts.index'))->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // check if new image
        if ($request->hasFile('featured')) {
            // upload it
            $imageName = time() . $request->featured->extension();
            $featured = $request->featured->storeAs('posts', $imageName);
            // delete old one
            $post->deleteImage();

            // update the database
            $post->update([
                'featured' => 'storage/' . $featured
            ]);

        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }


        // update attributes
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category
        ]);

        return redirect(route('posts.index'))->with('success', 'Post Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }


        return redirect(route('posts.index'))->with('success', 'Post Deleted Successfully.');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        return redirect(route('posts.index'))->with('success', 'Post restored successfully.');
    }
}
