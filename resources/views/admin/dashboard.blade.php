@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-header bg-dark text-bg-dark">{{ __('Published Posts') }}</div>

                    <div class="card-body">
                        {{ $posts->count() }}
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-header bg-dark text-bg-dark">{{ __('Categories') }}</div>
                    <div class="card-body">
                        {{ $categories->count() }}
                    </div>
                </div>

            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-header bg-dark text-bg-dark">{{ __('Users') }}</div>
                    <div class="card-body">
                        {{ $users->count() }}
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-header bg-danger text-bg-danger">{{ __('Trashed Posts') }}</div>
                    <div class="card-body">
                        {{ $trashedPosts->count() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
