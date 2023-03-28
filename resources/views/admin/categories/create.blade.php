@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ isset($category) ? __('Edit Category') : __('Create a Category') }}</div>

            <div class="card-body">
                <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name..."
                            value="{{ isset($category) ? $category->name : '' }}">
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            {{ isset($category) ? 'Update Category' : 'Store Category' }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
