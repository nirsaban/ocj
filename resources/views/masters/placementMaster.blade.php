<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.4.3/jspdf.plugin.autotable.js" integrity="sha256-DR7s6I3Jr2Moz+m3PV3zs0NqQCjHPso/FlPJ5ERhNsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha256-DupmmuWppxPjtcG83ndhh/32A9xDMRFYkGOVzvpfSIk=" crossorigin="anonymous"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>


<body >
<section class="top-nav" >
    <div>
        OnClickJOb
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
    <ul class="menu">
        <li>
            <a class="nav-link" href="{{url('/placement')}}">
                Home
            </a>

        </li>
        <li>
            <a class="nav-link" href='{{url('/allStudent')}}'>
                All student
            </a>

        </li>
        @checkCourses
        <li>
            <a class="nav-link" href='{{url('/allCourses')}}'>

                all courses
            </a>
        </li>
        @endcheckCourses
        <li>
            <a class="nav-link" href='{{url('/createCourse')}}'>

                create new Course
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{url('/allJobs')}}">

                All Jobs
            </a>
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
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">

@yield('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>