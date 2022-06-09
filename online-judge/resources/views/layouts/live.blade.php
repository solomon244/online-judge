@if ($contestt > 0)
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> --}}
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../component_style.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            max-width: 100vw;
            width: 100vw;">
            
    <div id="app" >
        
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="width: 100%; background-color: #0e43b4fd; color: white;">
            {{-- <div class="container" style="width: 100%;"> --}}
                <div style="padding-left: 30px; color: white;" >
                    <img src="../../image/icpc.png" width="50px" height="50px" style="border-radius: 50%;">
                    <b style="font-size: 19px; font-weight: bold; padding-right: 30px; color: white;"> Contest name</b>
                    
                    <a class="navbar-brand" style="font-size: 16px; color: white;"; href="/p/{{$contestt}}">Problem </a>
                    
                    <a class="navbar-brand" style="font-size: 16px; color: white;"; href="/lc/clarification/{{$contestt}}">Clarification </a>

                    <a class="navbar-brand" style="font-size: 16px; color: white;" href="/s/{{$contestt}}" >Submission</a>
    
                    <a class="navbar-brand" style="font-size: 16px; color: white;" href="/lc/scoreboard/{{$contestt}}" >Score Board</a>

                    {{-- <a class="navbar-brand" href="/lc/contestant" style="font-size: 16px; color: white;">Contestant</a> --}}

                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between d-flex" id="navbarSupportedContent" style="padding-right: 30px;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand" id="leave" href="/home" style="font-size: 16px; color: yellow;">Leave Contest</a>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: white;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                       
                        <li class="nav-item dropdown">
                            <a style="color: white;"id="navbarDropdown" 
                                class="nav-link dropdown-toggle" 
                                href="#" role="button" 
                                data-bs-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            {{-- </div> --}}
        </nav>


        <main class="d-flex" style="width: 100%;">
            <div style="width: 80%;" class="pl-5">
                @yield('content')
            </div>
            <div style = "float: right; width: 250px;">
                @yield('submit')
                <div class="p-3"></div>
                {{--  --}}
                {{-- @yield('contest')  --}}
                
            </div>
            
        </main>
        <script src="../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

<style>
    #leave.hover{
        color: red;
    }
</style>
@endif