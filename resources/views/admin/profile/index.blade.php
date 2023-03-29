@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ __('Edit your Profile') }}</div>

            <div class="card-body">
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">UserName</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name..."
                            value="{{ isset($user) ? $user->name : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                            value="{{ isset($user) ? $user->email : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password...">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar...">
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $user->profile->avatar) }}" alt="Profile image" width="100px"
                            height="auto" class="rounded-3">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">About you</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ isset($user) ? $user->profile->about : '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Facebook profile</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook..."
                            value="{{ isset($user) ? $user->profile->facebook : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Youtube profile</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube..."
                            value="{{ isset($user) ? $user->profile->youtube : '' }}">
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm" type="submit">
                            Update profile
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
