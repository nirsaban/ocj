@extends('masters.studentMaster')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/student.css') }}">
    <div class="container" style="margin-bottom: 8rem">

        <h1 class="display-3">Hello, {{Auth::user()->name}} {{$title}}</h1>
        <h3 class="display-4">{{$second_title}}</h3>
    </div>
    </div>

    <div class="Jobs">
        @foreach($allJobs as $job)
        <div class="JobsCard">
        <h1 class="JobsCard-Title">{{$job->job_title}} <small>{{$job->company}}</small></h1>
          <h2 class="JobsCard-Image">
            <i class="fa fa-magic fa-3x"></i>
          </h2>
          <div class="JobsCard-JobDescription">
            {{$job->description}}
          </div>
            <div class="none">
          <div class="JobsCard-JobDescription">
            salary: {{$job->salary}}$
          </div>
          <div class="JobsCard-JobDescription">
          location: {{$job->location}}
          </div>
          <div  onClick="addLikeTojob('{{$job->id}}','{{Auth::id()}}')"><i class="far fa-thumbs-up fa-lg"></i></div>
        </div>
         <div class="Button" @if($userCategory == null) onclick="checkCategory({{Auth::id()}})" @else onClick="readMore(this)" @endif >View more</div>
        </div>
        @endforeach
    </div>
    <div class="Overlayer">
    </div>
@endsection
