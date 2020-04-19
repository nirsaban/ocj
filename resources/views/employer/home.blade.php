@extends('masters.employerMaster')
@section('content')

    <div class="container" style="margin-bottom: 8rem">

        <h1 class="display-3">Hello {{Auth::user()->name}}, {{$title}}</h1>
        <h5 class="">{{$second_title}}-</h5>

        <select class="browser-default custom-select">
            <option>sort by course</option>
            @foreach($courses as $course)
            <option value="{{$course['id']}}">{{$course['name']}}</option>
            @endforeach
        </select>
     @foreach($jobs as $job)
            <div class="row">
                <div class="col-md-4" style="margin-top: 8rem">
                    <h4>{{$job->job_title}}</h4>
                    <p>{{$job->description}}</p>
                    <p><a class="btn btn-secondary"role="button">View details &raquo;</a></p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
    </div>
    </div>
@endsection
