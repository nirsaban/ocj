<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnClickJob</title>

    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" /> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <!--materilaize-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">

</head>


<body class="grey lighten-2">
    <ul id="dropdown1" class="dropdown-content">
        <li><a onclick="showMessages('{{Auth::id()}}','old')"> old message</a></li>
        <li class="divider"></li>
        <li><a onclick="showMessages('{{Auth::id()}}','profile')">profile message</a></li>
      </ul>
      <ul id="dropdown2" class="dropdown-content">
        <li>
            <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
        </li>

      </ul>
    <nav class="red lighten-1 " >
        <div class="nav-wrapper">
            <a href="{{url('/student')}}" class="m brand-logo">OnClickJob</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-nav">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down "  >
                <li><a  class="flow-text" onclick="window.location='{{url('profile').'/'.Auth::id()}}'" >Profile</a></li>
                <li><a class="flow-text" onclick="window.location='{{url('/formatCv')}}'">Send Cv</a></li>
                <li>
                    <a  class="dropdown-trigger" href="#!" data-target="dropdown1">
                        <i class="material-icons" style="font-size: 2.4rem">message<i class="material-icons right">arrow_drop_down</i></i>
                    </a>
                </li>
                <span style="position: absolute;top:12px;right:165px;color:#0a0909" id ='countMessage' class="flow-text navbar-toggler-bar navbar-kebab  "></span>
                <li>
                    <a class="dropdown-trigger flow-text" href="#!" data-target="dropdown2">
                        <i class="material-icons right">arrow_drop_down</i>
                        {{ Auth::user()->name }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <ul class="sidenav" id="mobile-nav">
            <li><a href="#">Home</a></li>
                <li><a onclick="window.location='{{url('profile').'/'.Auth::id()}}'" >Profile</a></li>
                <li><a onclick="window.location='{{url('/formatCv')}}'">Send Cv</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
    </ul>
<input type="hidden" id="idToMessages" value="{{Auth::id()}}">

@include('student.partials.modal')
@yield('content')

{{-- <script src="{{mix('js/app.js')}}"></script> --}}

 <script src="{{asset('js/messages.js')}}"></script>
<script src="{{asset('js/student.js')}}"></script>
<script src="{{asset('js/profileTest.js')}}"></script>
<script>
    $(document).ready(function(){
     $('.sidenav').sidenav();
     $(".dropdown-trigger").dropdown();
 });

</script>
</body>
</html>
