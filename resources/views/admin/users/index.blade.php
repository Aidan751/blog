@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ __('Users') }}</div>

            <div class="card-body">
                @if ($users->count() > 0)
                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px"
                                            height="60px" class="rounded-3">
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        @if ($user->trashed())
                                            <a href="{{ route('users.restore', $user->id) }}"
                                                class="btn btn-info btn-sm me-2">Restore</a>
                                        @else
                                            @if ($user->is_admin)
                                                <a href="{{ route('users.permissions', $user->id) }}"
                                                    class="btn btn-danger btn-sm me-2">Remove Permissions</a>
                                            @else
                                                <a href="{{ route('users.permissions', $user->id) }}"
                                                    class="btn btn-info btn-sm me-2">Make Admin</a>
                                            @endif
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('users.kill', $user->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ $user->trashed() ? 'Delete' : 'Trash' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">No Users Yet</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
