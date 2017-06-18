<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ACTS') }}</title>
    <link rel="shortcut icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset ('img/icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" media="all" href="{{ asset('css/icons.css') }}" type="text/css">
    <link rel="stylesheet" media="all" href="{{ asset('css/admin_page.css') }}" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset ('img/logo.png') }}" style = "height: 80px; margin-top: -30px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" class="btn btn-sm btn-default btn-icon-left"><i class="fa fa-sign-in"></i> Вхід</a></li>
                        @else
                            <li>
                            <a href="#" class="btn btn-sm btn-default btn-icon-left" data-toggle="modal" data-target="#loginModal"><i class="icon-head"></i> 
                                    {{ Auth::user()->username }}</a>
                                </li>
                                    <li>
                                    <a href="{{ route('logout') }}" class="btn btn-sm btn-default btn-icon-left" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                            Вихід
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')


        @yield('changeuserdata')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
