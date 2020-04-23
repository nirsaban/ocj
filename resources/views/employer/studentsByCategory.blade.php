@extends('masters.employerMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/studentCategory.css') }}">
@foreach($students as $student)
    <div class="card">
        <header>
            <h1>{{$student->user['name']}}</h1>
            <h2>{{$student->category['cat_name']}}</h2>
             @if(isset($student->image))
            <img src="{{asset('images/_'.$student->user['id'].'/'.$student->image)}}" class="avatar" />
            @else <img src="{{asset('images/avatar.jpg)}}" class="avatar">
            @endif
        </header>
        <article>
            <p>{{$student->about_me}}</p>
        </article>

        <footer>
            <p class="cf">
                    <a class="align-left share" href="#"><i class="fa fa-fw fa-share"></i> Go to My profile</a>
            </p>
        </footer>
    </div>
@endforeach
@endsection
