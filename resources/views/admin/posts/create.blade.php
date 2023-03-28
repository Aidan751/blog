@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ isset($post) ? __('Update Post') : __('Create a Post') }}</div>

            <div class="card-body">
                <form action="{{ isset($post) ? route('posts.update', $post->slug) : route('posts.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($post))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title..."
                            value="{{ isset($post) ? $post->title : '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="featured" class="form-label">Featured Image</label>
                        <input type="file" class="form-control" id="featured" name="featured">
                        @if (isset($post))

                            <img src={{ asset($post->featured) }} alt="{{ $post->title . ' image' }}" width="100%"
                                class="rounded-3 mt-2">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control"
                            value="{{ isset($post) ? $post->content : '' }}">
{{ isset($post) ? $post->content : '' }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if (isset($post)) @if ($post->category_id == $category->id)
                                            selected @endif
                                    @endif
                                    >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="mb-2">Tags</label>
                        @foreach ($tags as $tag)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        @if (isset($post)) @if ($post->hasTag($tag->id))
                                            checked @endif
                                        @endif
                                    >
                                    {{ $tag->tag }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            {{ isset($post) ? 'Update Post' : 'Store Post' }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
