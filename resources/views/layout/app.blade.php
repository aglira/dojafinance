@php use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    {{-- <link rel="icon" href="{{asset('amplop5.png')}}"> --}}

    <style>
        .navbar .nav-item .nav-link:hover {
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent; 
        }
        .navbar {
            background: linear-gradient(45deg, #E9967A);
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid #d6d6d6;
            box-shadow: 0 0 4px rgba(0,0,0,.1)
        }

        .navbar-nav a {
            color: black;
        }

        .body-nav {
           background-color: #E9967A; 
        }
    </style>

    <!-- Scripts --><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js" integrity="sha256-IW9RTty6djbi3+dyypxajC14pE6ZrP53DLfY9w40Xn4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="body-nav">
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand  text-warning fw-bold d-flex align-items-center " >
                <!-- <img src="{{asset('letter.png')}}" class="w-25"> -->
                <h2 class="fw-bold m-0 text-gradient" style="">
                 Doja Finance
                </h2>
            </a>
            <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
                <div class="navbar-nav" style="height: 90">
                        <a href="{{url('dashboard', [''])}}" class="nav-item nav-link">Dashboard</a>
                        <a href="{{url('pemasukan', [''])}}" class="nav-item nav-link">Pemasukan</a>
                        <a href="{{url('pengeluaran', [''])}}" class="nav-item nav-link">Pengeluaran</a>
                        <a href="{{url('data_anggota', [''])}}" class="nav-item nav-link">Data Anggota</a>
                        <a href="{{url('log', [''])}}" class="nav-item nav-link">Logs</a>
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item text-gradient">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                    @else
                        <li class="nav-item mx-4 d-flex align-items-center">
                            <h1 class="m-auto mx-2 text-gradient"><i class="bi bi-person"></i></h1>
                            <div>
                                <p class="mb-0 fs-5 text-gradient" >{{Auth::user()->username}}</p>
                                <p class="text-capitalize m-0 text-white">{{Auth::user()->role}}</p>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="btn logout btn-danger" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </li>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="my-4 container">
        @include('layout.flash-message')
        @yield('content')
    </main>
</div>

@yield('footer')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);
</script>
</body>
</html>

