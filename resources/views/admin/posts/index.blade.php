@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ __('Posts') }}</div>

            <div class="card-body">
                @if ($posts->count() > 0)
                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{ asset($post->featured) }}" alt="" width="100px" height="60px"
                                            class="rounded-3">
                                    </td>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        @if ($post->category)
                                            <a
                                                href="{{ route('categories.edit', $post->category->id) }}">{{ $post->category->name }}</a>
                                        @else
                                            <span class="text-danger">No Category</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($post->trashed())
                                            <a href="{{ route('posts.restore', $post->id) }}"
                                                class="btn btn-info btn-sm me-2">Restore</a>
                                        @else
                                            <a href="{{ route('posts.edit', ['post' => $post->slug]) }}"
                                                class="btn btn-info btn-sm me-2">Edit</a>
                                        @endif

                                        <form action="{{ route('posts.kill', $post->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">No Posts Yet</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
