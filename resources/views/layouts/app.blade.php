<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  @if(Auth::user())
                    <ul class="navbar-nav mr-auto">
                      {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-font-bold" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Movies</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item  nav-item nav-link" href="{{route('movies.index')}}">All movies</a>
                          <a class="dropdown-item  nav-item nav-link" href="#">Add movie</a>
                          <a class="dropdown-item  nav-item nav-link" href="#">Edit movie</a>
                          <a class="dropdown-item  nav-item nav-link" href="#">Update movie</a>
                        </div>
                      </li> --}}


                        <li class="nav-item nav-link"><a href="{{route('movies.index')}}"><h5>Movies</h5></a></li>
                        <li class="nav-item nav-link"><a href="{{url('movies?published=true')}}"><h5>Published</h5></a></li>
                        <li class="nav-item nav-link"><a href="{{url('movies?unpublished=true')}}"><h5>Unpublished</h5></a></li>
                        <li class="nav-item nav-link"><a href="{{route('casts.index')}}"><h5>People</h5></a></li>
                    </ul>
                  @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">
                        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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
    @stack('beforeScripts')
    {{-- @section('script')

    @show --}}
</body>
</html>
