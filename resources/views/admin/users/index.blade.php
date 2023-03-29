@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card p-0">
            <div class="card-header">{{ strpos(URL::current(), 'trashed') ? 'Trashed Users' : 'Users' }}</div>

            <div class="card-body">
                @if ($users->count() > 0)
                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            @if (URL::current() == route('users.index'))
                                <th>Permissions</th>
                            @endif
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $user->profile->avatar) }}" alt="User Avatar"
                                            width="60px" height="60px" style="border-radius:50%">
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    @if (!strpos(URL::current(), 'trashed'))
                                        <td>
                                            @if (Auth::id() !== $user->id)
                                                @if ($user->is_admin)
                                                    <a href="{{ route('users.permissions', $user->id) }}"
                                                        class="btn btn-danger btn-sm me-2">Remove Permissions</a>
                                                @else
                                                    <a href="{{ route('users.permissions', $user->id) }}"
                                                        class="btn btn-info btn-sm me-2">Make Admin</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    <td class="text-center">
                                        @if ($user->trashed())
                                            <a href="{{ route('users.restore', $user->id) }}"
                                                class="btn btn-info btn-sm me-2">Restore</a>
                                        @endif
                                        @if (Auth::id() !== $user->id)
                                            <form action="{{ route('users.kill', $user->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{ $user->trashed() ? 'Delete' : 'Trash' }}
                                                </button>
                                            </form>
                                        @endif
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
