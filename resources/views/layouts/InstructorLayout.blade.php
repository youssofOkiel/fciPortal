<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FCI-Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @livewireStyles

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <i class='fab fa-chrome	mr-2' style='font-size:48px;color:#00ba88'></i>

            <a class="navbar-brand tracking-wider " href="{{ url('/') }}">
                FCI-Portal
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto ">


                    <li class="nav-item tracking-wider mx-2 my-auto">
                        <a href="{{ route('instructor') }}">
                            Courses
                        </a>
                    </li>

                    <li class="nav-item tracking-wider mx-2 my-auto">
                        <a href="#">
                            sections
                        </a>
                    </li>

                    <li class="nav-item tracking-wider mx-2 my-auto">
                        <a href="#">
                            Schedule
                        </a>
                    </li>

                    <li class="nav-item tracking-wider mx-2 my-auto">
                        <a href="#">
                            Announcement
                        </a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if(Auth::user()->role_id == 1 )
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        <i class="fa fa-cogs" style="font-size:18px"></i>

                                        Dashboard
                                    </a>
                                @elseif(Auth::user()->role_id == 2)
                                    <a class="dropdown-item" href="{{ route('instructor') }}">
                                        <i class="fa fa-cogs" style="font-size:18px"></i>

                                        Dashboard
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fa fa-user-circle" style="font-size:18px"></i>

                                        profile
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" style="font-size:18px"></i>

                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item" >
                            <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="rounded-full w-8 h-8">
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        @yield('content')

    </main>
</div>
@livewireScripts

</body>
</html>
