@extends('masters.studentMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/homeStudentNew.css') }}">
    <section class="container ">
        <div class="page-header">
        <h1 class="center">Welcome Back {{Auth::user()->name}}<br>
        <small>{{$title}}  <i class="small material-icons ">search</i> </h1>
        </div>
        @foreach($allJobs as $job)
        <div class="row active-with-click">
            <div class="col l4 col m3 col s12">
                <article class="material-card Red">
                    <h2>
                        <span>  {{$job['title']}}</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                         {{$job['company']}}
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                        <img class="img-responsive"  width="100%" src="{{asset('images/job.png')}}" alt="Design" title="Design">
                        </div>
                        <div class="mc-description">
                            <ul class="collection">
                                <li class="collection-item avatar">
                                 <i class="material-icons circle">info_outline</i>
                                  <span class="title">Description</span>
                                  <p>
                                      {{$job['description']}}
                                  </p>
                                </li>
                                <li class="collection-item avatar">
                                  <i class="material-icons circle">computer</i>
                                  <span class="title">requirements</span>
                                  <ol>
                                    @foreach(json_decode($job->requirements) as $require)
                                   <li>{{$require}}</li>
                                    @endforeach
                                </ol>
                                </li>
                                <li class="collection-item avatar">
                                  <i class="material-icons circle grey">location_on</i>
                                  <span class="title">Location</span>
                                <p>{{$job['location']}}<br>

                                  </p>

                                </li>
                                <li class="collection-item avatar">
                                  <i class="material-icons circle grey">monetization_on</i>
                                  <span class="title">Salary:</span>
                                  <p>{{$job['salary']}}
                                  </p>
                                </li>
                              </ul>
                        </div>
                    </div>
                    <a @if($userCategory == null) class="mc-btn-action" onclick="checkCategory({{Auth::id()}})" @else class="mc-btn-action"   @endif>
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4  class ="white"style="z-index: 50;">
                           {{$job['user']['name']}}
                        </h4>
                    <a class="col l10 s10 center">#{{$job['course']['name']}}#{{$job['category']['cat_name']}}</a>
                    <a href="#" class="btn btn-floating pulse ">

                        <i class="material-icons   col  s2 large text-red center"  onClick="addLikeTojob(0,'{{$job->id}}','{{Auth::id()}}')">thumb_up</i>
                    </a>
                    </div>
                </article>
            </div>
            @endforeach
        <section>


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
{{--    </>--}}


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

