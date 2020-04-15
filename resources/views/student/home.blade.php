@extends('masters.studentMaster')
@section('content')


    <div class="container" style="margin-bottom: 8rem">
        <h1 class="display-3">Hello, {{Auth::user()->name}} {{$title}}</h1>
        <h3 class="display-4">{{$second_title}}</h3>
    </div>
    <div class="container mt-10">
        @foreach($allJobs as $job)
            <div class="row">
                <div class="col-md-4">
                    <h4>{{$job->job_title}}</h4>
                    <p>{{$job->description}}</p>
                    <p><a class="btn btn-secondary" @if($userCategory == null) onclick="checkCategory({{Auth::id()}})" @endif role="button">View details &raquo;</a></p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

@endsection
