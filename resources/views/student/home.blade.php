@extends('masters.studentMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/homeStudentNew.css') }}">
<div class="titre-content">
    <div>
        <h1>Hello {{Auth::user()->name}}</h1>
        <h2> {{$title}}</h2>
    </div>
</div>
@if(session()->has('message'))
    <div class="text-center">
        <div class="blur-out-expand-fwd">
            {{ session()->get('message') }}
        </div>
    </div>
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-center">
            <div class="  bounce-top ">
                {{$error}}
            </div>
        </div>
    @endforeach
@endif
<div class="container">

    @foreach($allJobs as $job)
        <div class="card">
            <div class="img-box">
                <img src="https://image.flaticon.com/icons/svg/681/681611.svg" alt="Design" title="Design">
                <h3> {{$job['category']['cat_name']}}

                </h3>
            </div>

            <div class="content">
                <p>
                    <i class="fas fa-heading"></i>
                    {{$job['title']}}
                </p>
                <p>
                    <i class="fa fa-briefcase"></i>
                    {{$job['company']}}
                </p>
                <p>
                    <i class="fa fa-map-marker"></i>
                    {{$job['location']}}
                </p>
                <div class="card-footers">
                    <a @if($userCategory == null) onclick="checkCategory({{Auth::id()}})" @else href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$job['id']}}" @endif  type="button" class="btn col-5" id="left-panel-link" >View more</a>
                    <div style="color: black" class="modal fade " id="myModal_{{$job['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <center>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">x</button>
                                    </center>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h3 class="modal-titles" id="myModalLabel">More About {{$job['title']}}</h3>

                                </div>
                                <div class="modal-body">
                                    <center>
{{--                                        <img  src="{{asset('images/jobImg.jpg')}}"  name="aboutme" width="140" height="140" class="img-circle">--}}
                                        <h2 class="media-heading" >{{$job['category']['cat_name']}}</h2>
                                        <h3 class="media-heading"> {{$job['title']}}</h3>
                                        <h5  class="media-heading"> {{$job['company']}}</h5>
                                        <hr>
                                    </center>
                                    <center>
                                        <p class="text-left"><strong>description: </strong><br>
                                            {{$job['description']}}</p>
                                        <br>
                                    </center>
                                    <hr>
                                    <center>
                                        <p class="text-left"><strong>requirements: </strong><br>
                                            @foreach(json_decode($job['requirements']) as $require)
                                                @if(strlen($require) > 2)
                                                    {{$require}}<br>
                                                @endif
                                            @endforeach
                                        </p>
                                    </center>
                                    <hr>
                                    <center>
                                        <p class="text-left"><strong>Location: </strong><br>
                                            {{$job['location']}}<br>
                                        </p>
                                    </center>
                                    <hr>
                                    <center>
                                        <p class="text-left"><strong>salary: </strong><br>
                                            {{$job['salary']}}<br>
                                        </p>
                                    </center>

                                    <hr>
                                    <div class="text-center">
                                        <a class="none like" onClick="addLikeTojob(0,'{{$job->id}}','{{Auth::id()}}')"><i class="far fa-thumbs-up fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script>
    function deleteJob(data) {
        const url = data.href

        swal({
            title: 'Are you sure delete this job?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                axios({
                    method:'get',
                    url:url,
                }).then(({data})=>{
                    swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
                    location.reload()
                });

            }else{
                swal("Cancelled", "You dont deleted any post job:)", "error");
            }
        });
    }
</script>
@endsection


{{--<input type="hidden" id="userId" value="{{Auth::id()}}">--}}
{{--<link rel="stylesheet" href="{{ URL::asset('css/student.css') }}">--}}
{{--    <div class="container" style="margin-bottom: 8rem">--}}

{{--        <h1 class="display-3 text-center">Hello, {{Auth::user()->name}} {{$title}}</h1>--}}
{{--        <h3 class="display-4 text-center">{{$second_title}}</h3>--}}
{{--    </div>--}}
{{--    </div>--}}


{{--    <div class="JobsCard" >--}}
{{--        @foreach($allJobs as $job)--}}
{{--            <div class="card list-group-item-dark" >--}}
{{--                <div class="card-body">--}}
{{--                    <h1 class="card-title">{{$job->category['cat_name']}}</h1>--}}
{{--                    <ul class="list-group">--}}
{{--                        <li class="list-group-item list-group-item-secondary"><i class="fas fa-heading"></i> {{$job->title}}</li>--}}
{{--                        <li class="list-group-item list-group-item-secondary"><i class="fa fa-briefcase"style="font-size:20px;"></i> {{$job->company}}</li>--}}
{{--                        <li class="list-group-item none list-group-item-secondary"><i class="fa fa-map-marker"style="font-size:20px;"></i>{{$job->location}}</li>--}}
{{--                         <li class="list-group-item  list-group-item-secondary des"><i class="fas fa-info"></i> {{$job->description}}</li>--}}
{{--                        <li class="list-group-item none  list-group-item-secondary des"><i class="far fa-question-circle"></i>--}}
{{--                         @foreach(json_decode($job->requirements) as $require)--}}
{{--                            <p>{{$require}}</p>--}}
{{--                        @endforeach--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item none list-group-item-success"><i class="fas fa-hand-holding-usd"></i> {{$job->salary}}</li>--}}
{{--                        </ul>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <a class="none like" onClick="addLikeTojob(0,'{{$job->id}}','{{Auth::id()}}')"><i class="far fa-thumbs-up fa-lg"></i></a>--}}
{{--                    <a @if($userCategory == null) onclick="checkCategory({{Auth::id()}})" @else onclick ="readMore(this)" @endif  type="button" class="btn col-5" id="left-panel-link" >View more</a>--}}
{{--                </div>--}}


{{--            </div>--}}

{{--            @endforeach--}}
{{--            <div class="Overlayer" >--}}
{{--            </div>--}}
{{--    </div>--}}
{{--<!--modals!!!!-->--}}

{{--@endsection--}}

