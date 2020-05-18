@extends('masters.studentMaster')
@section('content')
    @if($cvFile)

        <link rel="stylesheet" href="{{ URL::asset('css/student.css') }}">

        <div class="modal fade" id="myModalCv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">CV Format  - <small>see and learn to write best Cv</small></h4> <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <!-- data-interval="false" prevents the carousel from cycling automatically -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active text-center">
                                <iframe width="700" height="800" src="{{asset('cvFormat/_'.Auth::user()->course_id.'/'.$cvFile)}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            </div>
                        </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <h2 class="display-5 text-center" style="margin-top: 2rem">Send cv to check</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">{{ __('Add cv format') }}
                        @if(session()->has('message'))
                            <div class="blur-out-expand-fwd">
                                {{ session()->get('message') }}
                            </div>
                        @endif</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('upload.cvToCheck') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group  ">
                                <label for="file" class="col-md-4 col-form-label text-sm-right">{{ __('Choose File') }}</label>
                                <label  for="file" class="file-input btn btn-dark btn-file" />Browse...</label>
                                <input type="file" id="file" name="cv" style="display: block" />
                                @error('cv')
                                <br>
                                <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn -border-none"  type="submit" ><i class="fas fa-upload fa-3x"></i></button>
                                </div>
                                @if($errors->any() && $errors->first() != 'you must choose Pdf file before sending' &&  $errors->first() != 'you must choose Course from dropdown before sending')
                                    <div class="validation text-danger text-center text-info small" style="font-size: .7rem">{{$errors->first()}}</div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @else
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Sorry {{Auth::user()->name}} No cv format Found </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <small>to return home please click a button below</small>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('/student')}}"> <button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                </div>
            </div>
{{--        <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content" style="width: 50rem">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title float-lg-left"> Sorry {{Auth::user()->name}} No cv format Found  </h4><i  style="padding-left:0.5rem; color: #1d643b" class="fas fa-check"></i>--}}
{{--                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" onclick="location.reload()">x</button>--}}
{{--                    </div>--}}

{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>--}}
{{--                        <button type="button" onclick="confirmMessages('{{Auth::id()}}','matches')" class="btn btn-primary">confirm all messages</button>--}}
{{--                    </div>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
    @endif


 @endsection


