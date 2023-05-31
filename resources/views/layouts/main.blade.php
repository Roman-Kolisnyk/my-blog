<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Blog')</title>
    <!-- Styles -->
    <link rel="ua-touch-icon" sizes="180x180" href="{{url('storage/images/UA-brand-logo.jpg')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('storage/images/UA-brand-logo.jpg')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('storage/images/UA-brand-logo.jpg')}}">
    <link rel="manifest" href="{{url('storage/images/UA-brand-logo.jpg')}}">
    <link href="{{ url('/') . mix('/css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ url('/') . mix('/js/app.js') }}"></script>
</head>
<body>
    <div class="menu" style="background-color: #e3f2fd;">
        <nav class="navbar navbar-expand-lg navbar-light" style="max-width: 80rem; margin-left: auto; margin-right: auto;">
            <a class="navbar-brand" href="{{route('home.index')}}">
                <img src="{{url('storage/images/UA-brand-logo.jpg')}}" alt="Ukraine About" width="50" height="35" class="d-inline-block align-text-top">
                <span style="vertical-align: -webkit-baseline-middle;">Ukraine About</span>
            </a>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('about.index')}}">About us</a>
                        </li>
                    </ul>
                </div>
            </div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-4 py-2 sm:block" style="margin-top: 11px; position: fixed;">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
{{--                        @endif--}}
                    @endauth
                </div>
            @endif
        </nav>
    </div>
    <div class="content" style="max-width: 80rem; margin-left: auto; margin-right: auto;">
        @yield('content', 'Not found')
    </div>
</body>
</html>
