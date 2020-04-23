@extends('masters.employerMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/editJob.css') }}">
    <h1 class="anim">edit your job post</h1>



    {{ Form::open(['action' => 'JobController@updateJob', 'method' => 'PUT']) }}
        <input type="hidden" value="{{$job->id}}" name="id" >
        <input type="hidden" value="{{$job->course_id}}" name="course_id" id="trickCat">
        <input type="hidden" name="requirements" value="{{$job->requirements}}" id="trickReq">
        <h1>Please fill all inputs !</h1>
        <div class="contentform">
            <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
            <div class="leftcontact" >
                <div id ="sub&main">
                    <div class="form-group">
                        <p>edit category<span>*</span></p>
                        <select    class="course form-control col-md-5 form-control-lg mainTitle @error('course_id') is-invalid @enderror" id="courseRegister" name="category_id" >
                            <option selected="true" disabled="disabled">main subject</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(json_decode($category->id) == json_decode($job->category_id)) selected style="background-color:#F6AA93;color:#FFF " @endif >{{$category['cat_name']}}</span></option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <p> title <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-heading"></i></span>
                    <div class="flex">
                        <input type="text" value="{{$job->title}}" name="title"  class="@error('title') is-invalid @enderror"/>
                        @error('title')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <p> Comapny Name <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-building"></i></span>
                    <div class="flex">
                        <input type="text" value="{{$job->company}}" name="company"  class="@error('company') is-invalid @enderror" />
                        @error('company')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>description <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-info-circle"></i></span>
                    <div class="flex">
                        <textarea  name="description"  class="description @error('description') is-invalid @enderror" >{{$job->description}}</textarea>
                        @error('description')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group" >
                    <div id="requirementsAll">
                        <p>Requirements <span>*</span></p>
                        <span class="icon-case"><i class="fas fa-hammer"></i></span>
                        <span class="icon-case changeToSave" id="disabledPlus"><i class="fas fa-plus-square "    onclick="addRequire()"></i></span><span class="icon-case changeToSave" id="disabled" style="display: none"><i class="fas fa-vote-yea" onclick="saveAllRequire(this)"></i></span>
                        @foreach(json_decode($job->requirements) as $require)
                            <input type="text" value="{{$require}}" class="require  @error('requirements') is-invalid @enderror"  id="reqIn"    placeholder="add require..."/>
                        @endforeach
                    </div>
                    @error('requirements')
                    <div class="validation ">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <p>Salary <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-dollar-sign"></i></span>
                    <div class="flex">
                        <input type="text" name="salary" id="currency-field" value="{{$job->salary}}" class="@error('salary') is-invalid @enderror"  data-type="currency" placeholder="₪6,000">
                        @error('salary')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>Company Address <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="flex">
                        <input type="text" name="location" value="{{$job->location}}"  class="@error('location') is-invalid @enderror"  data-rule="required"  placeholder=" Dizengoff 3,Tel-Aviv "/>
                        @error('location')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <p>phone <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-home"></i></span>
                    <div class="flex">
                        <input type="tel"   value="{{$job->phone}}"  name="phone" placeholder="this format: 03-1234567" pattern="^0\d([\d]{0,1})([-]{0,1})\d{7}$" class="@error('location') is-invalid @enderror"  >
                        @error('phone')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>E-mail <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-envelope"></i></span>
                    <div class="flex">
                        <input type="email" value="{{$job->email}}"  name="email"  class="@error('location') is-invalid @enderror" />
                        @error('email')
                        <div class="validation">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="bouton-contact">Update job</button>
    {{ Form::close() }}
    <script src="{{url('js/editjob.js')}}"></script>
@endsection
