@extends('masters.studentMaster')
@section('content')
<script>
const id = {{Auth::id()}}
</script>

<link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
<div class="container ">
    <header>
<div class="row">
<div class="card center col s12 grey lighten-4 ">
    <div class="col l10  push-l2">
        <h1 class="red-text  ">#{{$courseName}}</h1>
           <h3 class="red-text">{{Auth::user()->name .' '}}Profile</h3>
    </div>

</div>
</div>
</header>

<div class="row ">
    <div class="col s2">
        <div class="card-image valign-wrapper ">


                @if(isset($profile[0]['image']))
                <img src="{{asset('images/_'.Auth::id().'/'.$profile[0]['image'])}}" class="circle responsive-img" />
                @else
                <img src="{{asset('images/avatar.jpg')}}"  alt="" class="circle responsive-img" />
                @endif
         </div>
         <div class="row  ">
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data"  class="col s12 center">
                @csrf
                <input type="hidden" name="id" value="{{Auth::id()}}">
                <div class="file-field input-field center  col l6  s3 ">
                  <a class=" btn-large  blue lighten-2">
                      <span>Choose</span>
                    <i class="material-icons left">attach_file</i>
                    <input type="file" name="image">
                  </a>

                </div>
                <div class="file-field input-field center col l6 s3 ">
                    <button class="btn-large  waves-effect waves-light blue lighten-2" type="submit" name="action">Update
                        <i class="material-icons right blue lighten-2">cloud_upload</i>
                    </button>
                  </div>
              </form>
        </div>
    </div>
    <div class="col s6 l10 ">
        <div class="row ">
            <div class="col  s12 ">
              <ul class="tabs push-l2 ">
                <li class="tab col s2"><a href="#test1">Sub Category</a></li>
                <li class="tab col s2"><a class="active" href="#test2">About Me</a></li>
                <li class="tab col s2 "><a href="#test3">Educations</a></li>
                <li class="tab col s2"><a href="#test4">Test 4</a></li>
                <li class="tab col s2"><a href="#test5">Test 5</a></li>
                <li class="tab col s2"><a href="#test6">Test 6</a></li>

              </ul>
            </div>
            <div id="test1" class="col s2 left">
                <div class="input-field col s12">
                    <select id="category">
                    <option value="" disabled selected>Choose your option</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                    @endforeach
                    </select>
                    <h3><label>Category</label></h3>
                    <a onclick="updateCategory()" class=" btn-large  blue lighten-2">
                      Update
                    </a>
                  </div>
            </div>
            <div id="test2" class="col s6 center-align">
                <div class="row">
                    <form class="col push-l4 s4">
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="textarea1" class="materialize-textarea"></textarea>
                          <label for="textarea1">About Me</label>
                        </div>
                      </div>
                    </form>
                  </div>
               </div>
            <div id="test3" class="col s3 push-l4 parentEductions">
            @include('student.partials.educations')
            </div>
            <div id="test4" class="col s12">Test 4</div>
            <div id="test5" class="col s12">Test 5</div>
            <div id="test6" class="col s12">Test 6</div>

          </div>

</div>
</div>
<div class="row">

</div>

 @endsection
