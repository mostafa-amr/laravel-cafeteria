<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cafeteria</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <link rel="stylesheet" href="{{asset('style/login.css')}}">
    <link rel="stylesheet" href="{{asset('style/register.css')}}">
    <link rel="stylesheet" href="{{asset('style/app.css')}}">
    <link rel="stylesheet" href="{{asset('style/userHomePage.css')}}">
    <link rel="stylesheet" href="{{asset('style/userOrder.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminHomePage.css')}}">
    <link rel="stylesheet" href="{{asset('style/admiProduct.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminAddUser.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminAddProduct.css')}}">
    <link rel="stylesheet" href="{{asset('style/admiUser.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminView.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminEditUser.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminCheckPage.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminEditProduct.css')}}">
    <link rel="stylesheet" href="{{asset('style/categoryIndex.css')}}">
    <link rel="stylesheet" href="{{asset('style/categoryEdit.css')}}">
    <link rel="stylesheet" href="{{asset('style/categoryShow.css')}}">
    <link rel="stylesheet" href="{{asset('style/adminViewPro.css')}}">
    <link rel="stylesheet" href="{{asset('style/checks.css')}}">
    <link rel="stylesheet" href="{{asset('style/checkOut.css')}}">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        @if ( Auth::user())

        <nav class="navbar navbar-expand-md navbar-light nav-bg-app shadow-sm">
            <div class="container">
                <p class="navbar-brand fw-bold me-4">
                    <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-top" alt="">
                </p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if ( Auth::user()->role != "admin")
                    <ul class="navbar-nav ">
                        <li>
                            <a href="{{route('indexUser')}}" class="linkk text-decoration-none text-black fs-5">Home</a>
                        </li>

                        <li>
                            <a href="{{route('orders.index')}}" class="linkk text-decoration-none text-black fs-5"> MyOrder</a>

                            {{-- <a href="" class="px-2 text-decoration-none text-black fs-4">MyOrder</a> --}}
                        </li>

                    </ul>

                    @else
                    <ul class="navbar-nav ">
                        <li>
                            <a href="{{route('adminIndex')}}" class="linkk px-2 text-decoration-none text-black fs-5"> Home</a>
                        </li>
                        <li>
                            <a href="{{route('adminProducts')}}" class="linkk px-2 text-decoration-none text-black fs-5">Products</a>
                        </li>
                        <li>
                            <a href="{{route('Users.index')}}" class="linkk px-2 text-decoration-none text-black fs-5">Users</a>
                        </li>
                        <li>
                            <a href="{{route('adminManualOrder')}}" class="linkk px-2 text-decoration-none text-black fs-5">Orders Status</a>
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}" class="linkk px-2 text-decoration-none text-black fs-5">Categories</a>
                        </li>
                        <li>
                            <a href="{{route('checks')}}" class="linkk text-decoration-none text-black fs-5">Order History</a>
                        </li>
                    </ul>

                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto d-md-flex justify-content-md-center align-items-md-center">
                        <li>
                            <img src="{{ asset('images/user4.png') }}" alt="error" style="width:50px;height:50px " class="rounded-2 m-1">

                        </li>
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                        <li class="nav-item dropdown">
                            <div class="div ">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        {{-- @else --}}
                        {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        </li> --}}
                        {{-- @endguest --}}
                    </ul>
                    {{-- <div class="d-flex align-items-center"  >
                        <img src="{{ asset('images/havaneseBg.jpg') }}" alt="" style="width:50px;height:50px " class="rounded-2" >
                    <p class="ms-1 mb-0 fs-4">Mostafa</p>
                </div>
            </div> --}}
    </div>
    </nav>
    @endif
    @if ( !Auth::user())

    <nav class="navbar navbar-expand-md navbar-light nav-bg-app shadow-sm">
        <div class="container">
            <p class="navbar-brand fw-bold me-4">
                <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-top" alt="">
            </p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <ul class="navbar-nav ">
                    <li>
                        <a href="{{route('indexUser')}}" class="linkk text-decoration-none text-black fs-5">Home</a>
                    </li>



                </ul>





                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto d-md-flex justify-content-md-center align-items-md-center">
                    <li>
                        <img src="{{ asset('images/user4.png') }}" alt="error" style="width:50px;height:50px " class="rounded-2 m-1">

                    </li>
                    <!-- Authentication Links -->
                    {{-- @guest --}}
                    <li class="nav-item dropdown">
                        <div class="div ">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Login') }}
                                </a>

                                <form id="logout-form" action="{{ route('login') }}" method="get" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    {{-- @else --}}
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </li> --}}
                    {{-- @endguest --}}
                </ul>
                {{-- <div class="d-flex align-items-center"  >
                <img src="{{ asset('images/havaneseBg.jpg') }}" alt="" style="width:50px;height:50px " class="rounded-2" >
                <p class="ms-1 mb-0 fs-4">Mostafa</p>
            </div>
        </div> --}}
        </div>
    </nav>
    @endif
    <main class="">
        @yield('content')
    </main>

    @yield('product');
    @yield('products');
    </div>
    <script src="{{asset('js/home.js')}}"></script>

</body>

</html>