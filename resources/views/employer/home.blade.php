@extends('masters.employerMaster')
@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/homeEmployer.css') }}">
    <div class="container" style="margin-bottom: 8rem">

        <h1 class="display-3">Hello {{Auth::user()->name}}, {{$title}}</h1>
        <h5 class="">{{$second_title}}-</h5>

        <select class="browser-default custom-select" id="sortJobs" onchange="sortJobs(this)">
            <option>show all jobs</option>
            @foreach($courses as $course)
            <option value="{{$course['id']}}">{{$course['name']}}</option>
            @endforeach
        </select>
    <div class="Jobs">
        @foreach($jobs as $job)

            <div class="JobsCard" id="<?php print_r(str_replace(' ','',$job->course['name']));?>">
                <h1 class="JobsCard-Title" id="courseName"> <small>{{$job->course['name']}}</small></h1>
                <h2 class="JobsCard-Title">
                    <small>{{$job->category['cat_name']}}</small>
                </h2>
                <h2 class="JobsCard-Image">
                    <i class="fa fa-magic fa-3x"></i>
                </h2>
                <div class="JobsCard-JobDescription">
                    {{$job->title}}
                </div>
                <div class="none">
                    <div class="JobsCard-JobDescription">
                        salary: {{$job->company}}$
                    </div>
                    <div class="JobsCard-JobDescription">
                        salary: {{$job->description}}$
                    </div>
                    <div class="JobsCard-JobDescription">
                        Requirements:
                           @foreach(json_decode($job->requirements) as $require)
                               @if(strlen($require) > 2)
                           <li>{{$require}}</li>
                            @endif
                        @endforeach
                        </div>
                    <div class="JobsCard-JobDescription">
                        location: {{$job->location}}
                    </div>
                    <div class="JobsCard-JobDescription">
                        salary: {{$job->salary}}
                    </div>
                    <div  onClick="addLikeTojob('{{$job->id}}','{{Auth::id()}}')"><i class="far fa-thumbs-up fa-lg"></i></div>
                </div>
                <div class="Button" onClick="readMore(this)">View more</div>
                <div class="Button" onClick="readMore(this)">all student</div>
            </div>
        @endforeach
    </div>
    <div class="Overlayer">
    </div>
        <script src="{{url('js/employer.js')}}"></script>
@endsection
