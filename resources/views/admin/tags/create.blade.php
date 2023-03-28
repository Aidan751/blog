@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ isset($tag) ? __('Update Tag') : __('Create a Tag') }}</div>

            <div class="card-body">
                <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($tag))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="title" class="form-label">Tag</label>
                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag..."
                            value="{{ isset($tag) ? $tag->tag : '' }}">
                    </div>
                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            {{ isset($tag) ? 'Update Tag' : 'Store Tag' }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
