<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>
    <!-- Compiled and minified CSS -->
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
=======

>>>>>>> c1219e8b44a669314950a7a8a81168655f46a3c6

    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.4.3/jspdf.plugin.autotable.js" integrity="sha256-DR7s6I3Jr2Moz+m3PV3zs0NqQCjHPso/FlPJ5ERhNsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha256-DupmmuWppxPjtcG83ndhh/32A9xDMRFYkGOVzvpfSIk=" crossorigin="anonymous"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>


<body>
<section class="top-nav">
    <div>
        OnClickJOb
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
    <ul class="menu">
        <li>
            <a class="nav-link" href="{{url('/employer')}}">
                Home

            </a>
        </li>
        <li>
            <a class="nav-link" href='{{url('job/create')}}'>

                Create new job
            </a>
        </li>
        <li>
        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  <span style="padding: 0" class="badge badge-info" id="countMessage"></span><i class="fas fa-comments  " ></i>
                <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','old')">
                    old message
                </a>
                <a class="dropdown-item" onclick="showMessages('{{Auth::id()}}','profile')">
                    messages about jobs
                </a>
            </div>
        </li>
        </li>
        <li><li class="nav-item dropdown">
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
        </li></li>

    </ul>
</section>
<input type="hidden" id="idToMessages" value="{{Auth::id()}}">
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
@include('.employer.partials.modal')
@yield('content')

<script src="{{mix('js/app.js')}}"></script>
<script src ="{{asset('js/employer.js')}}"></script>
<script src ="{{asset('js/messages.js')}}"></script>
</body>
</html>
