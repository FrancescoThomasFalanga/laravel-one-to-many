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

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="fluid-container">

        <nav id="nav-custom" class="fixed-top mb-5">

            <div class="left">

                <div class="logo">
    
                    <a href="{{route('admin.homepage')}}">
                        <img src="" alt="LOGO">
                    </a>
    
                </div>
    
    
                <div class="links">
    
                    <ul>
    
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'admin.homepage') ? 'active' : ''}}" href="{{route('admin.homepage')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'admin.projects') ? 'active' : ''}}" href="{{route('admin.projects.index')}}">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Contact
                            </a>
                        </li>
    
                    </ul>
    
                </div>
                
            </div>



            <div class="auth">

                <!-- Right Side Of Navbar -->
                <ul>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('admin.projects.index') }}">{{__('Manage Projects')}}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>

            </div>

        </nav>

        <div id="admin-layout">

            <aside id="admin-sidebar">
    
                <div class="d-flex gap-3 me-3 mt-5 flex-column p-4 border-end dashboard-sidebar">
            
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action">Home</a>
                            <a href="{{url('profile')}}" class="list-group-item list-group-item-action">Profile</a>
                        </div>
                    </div>
            
                    <div class="card">
                        <div class="card-header">
                            Projects
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{route('admin.projects.index')}}" class="list-group-item list-group-item-action">All Projects</a>
                            <a href="{{route('admin.projects.create')}}" class="list-group-item list-group-item-action">Add Projects</a>
                        </div>
                    </div>
            
                    <div class="card">
                        <div class="card-header">
                            Categories
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{route('admin.types.index')}}" class="list-group-item list-group-item-action">All Types</a>
                            <a href="{{route('admin.types.create')}}" class="list-group-item list-group-item-action">Add Type</a>
                        </div>
                    </div>
            
                </div>
            
            </aside>

            
            <main class="">
                @yield('content')
            </main>
            
        </div>


        <footer>

            <div class="copyright">

                <p>
                    Built From Laravel With 
                    <span>💚</span>    
                    © Copyright 2023, CiccioDev. All Rights Reserved.
                </p>

            </div>

        </footer>


    </div>
</body>

</html>