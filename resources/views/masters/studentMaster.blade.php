<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OnClickJob</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://malsup.github.com/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/profile.css')}}">
</head>

<body>
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ON CLICK JOB</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fa fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="window.location='{{url('profile').'/'.Auth::id()}}'">
                    <i class="fa fa-user"></i>
                    My profile
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fas-envelope-o">
                        <span class="badge badge-primary">11</span>
                    </i>
                    Your message
                </a>

            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-newspaper fa-2x"></i>
                    <span class="badge badge-info">11</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="far fa-handshake fa-2x"> </i>
                    <span class="badge badge-success">11</span>


                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-graduate fa-2x">   </i>
                    <span class="badge badge-danger">11</span>
                </a>
            </li>

        </ul>
    </div>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</nav>

@yield('content')
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/profile.js')}}"></script>
</body>
</html>

