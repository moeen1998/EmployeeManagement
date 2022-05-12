<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images.jfif') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .text-normal:hover{
            --bs-text-opacity: 1;
            cursor: pointer;
        }
        .text-normal .inline::after{
            content: ">"
        }
        .spliter{
            border-top: 2px solid rgb(199, 199, 199);
            margin: 10px 0px
        }
        .table > :not(:first-child) {
            border-top: none;
        }
    </style>
</head>
<body>
    <div id="app">

        <div class="d-flex justify-content-between" style="min-height: 100vh">
            
            <!-- Sidebar -->
            <div class="bg-primary px-1 py-3 text-center">
                <div class="px-3 fw-bold text-light" style="cursor: pointer;">
                    <a class="btn text-nowrap text-normal text-light text-decoration-none" href="{{route('home')}}"><i class="fas fa-laugh-wink fs-2" style="transform:rotate(-15deg)"></i><span class="d-none d-lg-inline fs-2 mx-2">Dashboard</span></a>
                </div>
                
                <div class="spliter"></div>
                <div class="text-lg-start text-xs-center">
                    <button class="btn text-normal overflow-hidden text-light fs-5 text-opacity-75" type="button">
                        <i class="fas fa-fw fa-gear"></i>
                        <a class="d-none d-lg-inline text-nowrap text-normal text-light fs-5 text-opacity-75 text-decoration-none" href="{{ route('employees.index') }}"><span class=" text-nowrap ">Employee Management</span></a>
                    </button>
                </div>
                <div class="spliter"></div>

                <div class="text-lg-start text-xs-center">
                    <button class="btn text-normal overflow-hidden text-light fs-5 text-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#Components" aria-expanded="false" aria-controls="Components">
                        <i class="fas fa-fw fa-wrench "></i>
                        <span class="d-none d-lg-inline text-nowrap ms-2">System Management</span>
                    </button>
                    <div class="collapse" id="Components">
                        <div class="text-normal text-light text-opacity-75">
                            <ul class="list-group text-start fs-6">
                                <a class="text-reset text-decoration-none" href="{{ route('departements.index') }}"><li class="list-group-item">Departement</li><a>
                                    <a class="text-reset text-decoration-none" href="{{ route('countries.index') }}"><li class="list-group-item">Country</li><a>
                                <a class="text-reset text-decoration-none" href="{{ route('states.index') }}"><li class="list-group-item">State</li><a>
                                <a class="text-reset text-decoration-none" href="{{ route('cities.index') }}"><li class="list-group-item">City</li><a>
                            </ul>                        
                        </div>
                    </div>
                </div>
                <div class="spliter"></div>
                <div class="text-lg-start text-xs-center">
                    <button class="btn  text-normal text-light fs-5 text-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#Edit" aria-expanded="false" aria-controls="Edit">
                        <i class="fas fa-fw fa-user-pen"></i>
                        <span class="d-none d-lg-inline text-nowrap ms-2">User Management</span>
                    </button>
                    <div class="collapse" id="Edit">
                        <div class="text-normal text-light text-opacity-75">
                            <ul class="list-group text-start fs-6">
                                <a class="text-reset text-decoration-none" href="{{route('users.index')}}"><li class="list-group-item">Users</li><a>
                            </ul>                        
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of Sidebar -->
            <div class="flex-grow-1 px-2">
                <nav class="navbar py-3 px-2 navbar-expand navbar-light bg-white topbar mb-4 static-top">

                    <a class="navbar-brand text-success fw-bold" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
                <div class="content" style="min-height: 78vh">
                    @yield('content')
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">

                            <strong>Created By Moeen Adly Mansour</strong>
                            <br/>
                            <span>Copyright &copy; Reserved 2022</span>
                        </div>
                    </div>
                </footer>
            </div> 
        </div>
    </div>
</body>
</html>
