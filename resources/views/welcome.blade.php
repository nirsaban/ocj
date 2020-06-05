
    @extends('layouts.app')
    @section('content')



        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">Welcome To OnClickJob</h1>
                </div>
                <div class="login-form">
                    <form action="{{ route('login') }}" method="POST" class="form_container">
                        @csrf
                        <div class="avatar  blue lighten-4"><i class="material-icons">&#xE7FF;</i></div>
                        <h2 class="text-center display-5">Login to Your Account</h2>

                        <div class="form-group">
                                <div class="input-field col ">
                                    <i class="material-icons prefix ">mail_outline</i>
                                    <input id="email" type="email" name="email" class="validate" required="required">
                                    @error('email')
                                    <div class="text-danger text-center text-info " style="font-size: 1rem">{{ $message }}</div>
                                    @enderror
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        <div class="form-group">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_outline</i>
                                    <input id="password" name="password" type="password" class="validate">
                                    @error('password')
                                    <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>
                        </div>

                        <div class="text-center">
                            <button class="btn waves-effect waves-light blue lighten-4" type="submit" name="action">Login
                                <i class="material-icons right blue lighten-4">send</i>
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
