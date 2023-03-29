@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ isset($user) ? __('Update user') : __('Create a user') }}</div>

            <div class="card-body">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name..."
                            value="{{ isset($user) ? $user->name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                            value="{{ isset($user) ? $user->email : '' }}">
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            {{ isset($user) ? 'Update user' : 'Add user' }}
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
