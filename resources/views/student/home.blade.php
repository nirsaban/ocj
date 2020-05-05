@extends('masters.studentMaster')
@section('content')
<input type="hidden" id="userId" value="{{Auth::id()}}">
<link rel="stylesheet" href="{{ URL::asset('css/student.css') }}">
    <div class="container" style="margin-bottom: 8rem">

        <h1 class="display-3 text-center">Hello, {{Auth::user()->name}} {{$title}}</h1>
        <h3 class="display-4 text-center">{{$second_title}}</h3>
    </div>
    </div>


    <div class="JobsCard" >
        @foreach($allJobs as $job)
            <div class="card list-group-item-dark" >
                <div class="card-body">
                    <h1 class="card-title">{{$job->category['cat_name']}}</h1>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary"><i class="fas fa-heading"></i> {{$job->title}}</li>
                        <li class="list-group-item list-group-item-secondary"><i class="fa fa-briefcase"style="font-size:20px;"></i> {{$job->company}}</li>
                        <li class="list-group-item none list-group-item-secondary"><i class="fa fa-map-marker"style="font-size:20px;"></i>{{$job->location}}</li>
                         <li class="list-group-item  list-group-item-secondary des"><i class="fas fa-info"></i> {{$job->description}}</li>
                        <li class="list-group-item none  list-group-item-secondary des"><i class="far fa-question-circle"></i>
                         @foreach(json_decode($job->requirements) as $require)
                            <p>{{$require}}</p>
                        @endforeach
                        </li>
                        <li class="list-group-item none list-group-item-success"><i class="fas fa-hand-holding-usd"></i> {{$job->salary}}</li>
                        </ul>
                </div>
                <div class="card-footer">
                    <a class="none like" onClick="addLikeTojob(0,'{{$job->id}}','{{Auth::id()}}')"><i class="far fa-thumbs-up fa-lg"></i></a>
                    <a @if($userCategory == null) onclick="checkCategory({{Auth::id()}})" @else onclick ="readMore(this)" @endif  type="button" class="btn col-5" id="left-panel-link" >View more</a>
                </div>


            </div>

            @endforeach
            <div class="Overlayer" >
            </div>
    </div>
<!--modals!!!!-->

@endsection

