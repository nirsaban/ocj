<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OnClickJob') }}</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles --><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
    <style>

        html {
            font-size: 14px;
        }
        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
    </style>
</head>
<body>

<nav>
    <div class="nav-wrapper  blue lighten-4">
        <div class="container">
        <a href="{{ url('/') }}" class="brand-logo ">OnClickJob</a>
        </div>
{{--    @guest--}}
{{--        @if (Route::has('register'))--}}
{{--            @endif--}}
{{--        @else--}}
{{--        <ul id="nav-mobile" class="right hide-on-med-and-down">--}}
{{--            <li>--}}
{{--                <a class="center" href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                    document.getElementById('logout-form').submit();">--}}
{{--                {{ __('Logout') }}</a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--        @endguest--}}
    </div>
</nav>


            @yield('content')


</body>
</html>
