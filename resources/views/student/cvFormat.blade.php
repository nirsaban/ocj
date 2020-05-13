@extends('masters.studentMaster')
@section('content')
    <div class="container">
        <h3 class="display-3">see and learn to write best Cv</h3>
        <div class="row">
            <iframe  src= "{{asset('cvFormat/_'.Auth::user()->course_id.'/'.$cvFile)}}" width='80%' style='height:80rem'></iframe>
        </div>
    </div>

 @endsection


