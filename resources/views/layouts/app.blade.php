<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                @auth
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item bg-dark text-bg-dark">
                                    {{ __('Profile') }}
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('profile.index') }}">{{ __('My Profile') }}</a>
                                </li>
                                @if (auth()->user()->is_admin)
                                    <li class="list-group-item bg-dark text-bg-dark">
                                        {{ __('Users') }}
                                    </li>
                                    <li class="list-group-item">
                                        <a class="nav-link" href="{{ route('users.create') }}">
                                            {{ __('Create User') }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="nav-link" href="{{ route('users.index') }}">
                                            {{ __('List Users') }}
                                        </a>
                                    </li>
                                @endif
                                <li class="list-group-item bg-dark text-bg-dark">
                                    {{ __('Posts') }}
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('posts.create') }}">
                                        {{ __('Create New Post') }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">
                                        {{ __('List Posts') }}
                                    </a>
                                </li>
                                <li class="list-group-item bg-dark text-bg-dark">
                                    {{ __('Categories') }}
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('categories.create') }}">
                                        {{ __('Create New Category') }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">
                                        {{ __('List Categories') }}
                                    </a>
                                </li>
                                <li class="list-group-item bg-dark text-bg-dark">
                                    {{ __('Tags') }}
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('tags.create') }}">
                                        {{ __('Create New Tag') }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('tags.index') }}">
                                        {{ __('List Tags') }}
                                    </a>
                                </li>
                                @if (auth()->user()->is_admin)
                                    <li class="list-group-item bg-dark text-bg-dark">
                                        {{ __('Settings') }}
                                    </li>
                                    <li class="list-group-item">
                                        <a class="nav-link" href="{{ route('settings.index') }}">
                                            {{ __('Edit Settings') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <ul class="list-group mt-5">
                                <li class="list-group-item bg-dark text-bg-dark">
                                    {{ __('Trashed') }}
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="{{ route('posts.trashed') }}">
                                        {{ __('Trashed Posts') }}
                                    </a>
                                </li>
                                @if (auth()->user()->is_admin)
                                    <li class="list-group-item">
                                        <a class="nav-link" href="{{ route('users.trashed') }}">
                                            {{ __('Trashed Users') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            @include('partials.errors')
                            @yield('content')
                        </div>
                    </div>
                @else
                    <div class="row">
                        @include('partials.errors')
                        @yield('content')
                    </div>
                @endauth
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        @if (session('success'))
            toastr.success('{{ session('success') }}')
        @endif
        @if (session('info'))
            toastr.info('{{ session('info') }}')
        @endif
        @if (session('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
    @yield('scripts')

</body>

</html>
