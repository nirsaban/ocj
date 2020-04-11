
    @extends('layouts.app')
    @section('content')
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">About this app</h1>
                    <p class="lead">Hi Dear Guest,<br>
                        The purpose for which the app was created is for the graduates to find the right job for them immediately upon graduation, and on the other hand, to accept the graduates they chose according to the profile and degree of fit for the job they posted.
                        In order for everyone to be satisfied, trusted information must be uploaded for the student or job you are posting
                        Good luck job on click team</p>
                </div>
                <main class="py-4">
                <div class="container">
                    <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Student</h4>
                            </div>
                            <div class="card-body">
                                {{-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> --}}
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Bulid your best profil   <img src="images/vstu.png" width="15px" height="20px"></li>
                                    <li>Find the dream job  <img src="images/vstu.png" width="15px" height="20px"></li>
                                    <li>Get important information  <img src="images/vstu.png" width="15px" height="20px"></li>
                                    <li>Feedback for  course content  <img src="images/vstu.png" width="15px" height="20px"></li>
                                </ul>
                                <a type="button" href="{{url('register?role=student')}}" class="btn btn-lg btn-block btn-outline-success ">Sign up for Student</a>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Department</h4>
                            </div>
                            <div class="card-body">
                                {{-- <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1> --}}
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>We did half the work for you  <img src="images/vdep.png" width="15px" height="20px"></li>
                                    <li>Update information  <img src="images/vdep.png" width="15px" height="20px"></li>
                                    <li>Continue after adjustment  <img src="images/vdep.png" width="15px" height="20px"></li>
                                    <li>Control of profiles and job  <img src="images/vdep.png" width="15px" height="20px"></li>
                                </ul>
                                <a type="button" href="{{url('register?role=department')}}" class="btn btn-lg btn-block btn-outline-warning">Sign up for Department</a>
                            </div>
                        </div>
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Employer</h4>
                            </div>
                            <div class="card-body">

                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Create a new job <img src="images/vemp.png" width="15px" height="20px"></li>
                                    <li>Find Student by category <img src="images/vemp.png" width="15px" height="20px"></li>
                                    <li>Edit and Delete Your job <img src="images/vemp.png" width="15px" height="20px"></li>
                                    <li>Add like to profil student <img src="images/vemp.png" width="15px" height="20px"></li>
                                </ul>
                                <a href="{{url('register?role=employer')}}" type="button" class="btn btn-lg btn-block btn-outline-danger">Sign up for employer</a>
                            </div>

                        </div>
                        <h5 class="display-5 text-center">You have an account ? please   <a href="">Login</a></h5>
                        <div class="row text-center">

                        </div>
                    </div>

    @endsection
