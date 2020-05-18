
    @extends('layouts.app')
    @section('content')

                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">About this app</h1>
                    <p class="lead" style="font-size: .8rem">Hi Dear Guest,<br>
                        The purpose for which the app was created is for the graduates to find the right job for them immediately upon graduation, and on the other hand, to accept the graduates they chose according to the profile and degree of fit for the job they posted.
                        In order for everyone to be satisfied, trusted information must be uploaded for the student or job you are posting
                        Good luck job on click team</p>
                </div>
                <div class="login-form">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>

                        <h4 class="modal-title">Login to Your Account</h4>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                            @error('email')
                            <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                            @error('password')
                            <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary ">
                            {{ __('Login') }}
                        </button>
                        </div>
                    </form>
                </div>
{{--                <main class="py-4">--}}
{{--                <div class="container">--}}
{{--                    <div class="card-deck mb-3 text-center">--}}
{{--                        <div class="card mb-4 box-shadow">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4 class="my-0 font-weight-normal">Student</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body" style="font-size: 1.3rem">--}}
{{--                                --}}{{-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> --}}
{{--                                <ul class="list-unstyled mt-3 mb-4">--}}
{{--                                    <li>Build your best profile   <img src="{{asset('images/vstu.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Find the dream job  <img src="{{asset('images/vstu.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Get important information  <img src="{{asset('images/vstu.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Feedback for  course content  <img src="{{asset('images/vstu.png')}}" width="15px" height="20px"></li>--}}
{{--                                </ul>--}}
{{--                                <a type="button" href="{{url('register?role=student')}}" class="btn btn-lg btn-block btn-outline-success ">Sign up for Student</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card mb-4 box-shadow">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4 class="my-0 font-weight-normal">Department</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body" style="font-size: 1.3rem">--}}
{{--                                --}}{{-- <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1> --}}
{{--                                <ul class="list-unstyled mt-3 mb-4">--}}
{{--                                    <li>We did half the work for you  <img src="{{asset('images/vdep.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Update information  <img src="{{asset('images/vdep.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Continue after adjustment  <img src="{{asset('images/vdep.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Control of profiles and job  <img src="{{asset('images/vdep.png')}}" width="15px" height="20px"></li>--}}
{{--                                </ul>--}}
{{--                                <a type="button" href="{{url('register?role=department')}}" class="btn btn-lg btn-block btn-outline-warning">Sign up for Department</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card mb-4 box-shadow">--}}
{{--                            <div class="card-header">--}}
{{--                                <h4 class="my-0 font-weight-normal">Employer</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body" style="font-size: 1.3rem">--}}

{{--                                <ul class="list-unstyled mt-3 mb-4">--}}
{{--                                    <li>Create a new job <img src="{{asset('images/vemp.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Find Student by category <img src="{{asset('images/vemp.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Edit and Delete Your job <img src="{{asset('images/vemp.png')}}" width="15px" height="20px"></li>--}}
{{--                                    <li>Add like to profil student<img src="{{asset('images/vemp.png')}}" width="15px" height="20px"></li>--}}
{{--                                </ul>--}}
{{--                                <a href="{{url('register?role=employer')}}" type="button" class="btn btn-lg btn-block btn-outline-danger">Sign up for employer</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <h5 class="display-5 text-center">You have an account ? please   <a href="">Login</a></h5>--}}
{{--                        <div class="row text-center">--}}

{{--                        </div>--}}
                    </div>
                    <script> window.localStorage.clear() </script>
    @endsection
