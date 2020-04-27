@extends('masters.employerMaster')
@section('content')


    <link rel="stylesheet" href="{{ URL::asset('css/employer.css') }}">
    <h1 class="anim">Create a new job</h1>

    <form action="{{url('/job/create')}}" method="POST">
        @csrf
        <input type="hidden" name="category_id" id="trickCat">
        <input type="hidden" name="requirements" id="trickReq">
        <h1>Please fill all inputs !</h1>
        <div class="contentform">
            <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
            <div class="leftcontact">
                <div id ="sub&main">
                <div class="form-group">
                    <p>main title<span>*</span></p>
                 <select  onchange="onChangeCourse(this)" class="course form-control col-md-5 form-control-lg mainTitle @error('course_id') is-invalid @enderror" id="courseRegister" name="course_id">
                     <option selected="true" disabled="disabled">main subject</option>
                     @foreach($courses as $course)
                     <option value="{{$course['id']}}">{{$course['name']}}</option>
                    @endforeach
                  </select>
                    @error('course_id')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                    <p> title <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-heading"></i></span>
                    <div class="flex">
                    <input type="text" name="title" onblur="addInput(this)" class="@error('title') is-invalid @enderror"/>
                    @error('title')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <p> Comapny Name <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-building"></i></span>
                    <div class="flex">
                    <input type="text" name="company" onblur="addInput(this)" class="@error('company') is-invalid @enderror" />
                    @error('company')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>description <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-info-circle"></i></span>
                    <div class="flex">
                    <textarea  name="description"  class="description @error('description') is-invalid @enderror" onblur="addInput(this)"></textarea>
                    @error('description')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group" >
                    <div id="requirementsAll">
                    <p>Requirements <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-hammer"></i></span>
                    <input type="text" class="require  @error('requirements') is-invalid @enderror"  id="reqIn"    placeholder="add require..."/><span class="icon-case changeToSave" id="disabledPlus"><i class="fas fa-plus-square "    onclick="addRequire()"></i></span><span class="icon-case changeToSave" id="disabled" style="display: none"><i class="fas fa-vote-yea" onclick="saveAllRequire(this)"></i></span>
                   </div>
                    @error('requirements')
                    <div class="validation ">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <p>Salary <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-dollar-sign"></i></span>
                    <div class="flex">
                    <input type="text" name="salary" id="currency-field" class="@error('salary') is-invalid @enderror"  data-type="currency" placeholder="₪6,000" onblur="addInput(this)">
                    @error('salary')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>Company Address <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="flex">
                    <input type="text" name="location" class="@error('location') is-invalid @enderror"  data-rule="required" onblur="addInput(this)" placeholder=" Dizengoff 3,Tel-Aviv "/>
                    @error('location')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>


                <div class="form-group">
                    <p>phone <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-home"></i></span>
                    <div class="flex">
                    <input type="tel"  onblur="addInput(this)"  name="phone" placeholder="this format: 03-1234567" pattern="^0\d([\d]{0,1})([-]{0,1})\d{7}$" class="@error('location') is-invalid @enderror"  >
                    @error('phone')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <p>E-mail <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-envelope"></i></span>
                    <div class="flex">
                    <input type="email" onblur="addInput(this)" name="contact_email"  class="@error('location') is-invalid @enderror" />
                    @error('contact_email')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>
                </div>

            </div>

            <div class="rightcontact">
                <div id="editor"></div>
                <div class="contentJob" id="content">
                    <div class="reset" onclick="resetForm()">
                        reset
                        <div class="reset2 size" ></div>
                    </div>
                    <div class="reset" id="toPdf">
                        <i class="fas fa-file-pdf"></i>
                        <div class="reset2" ></div>
                    </div>
                    <small style="letter-spacing: .4rem">live demo</small>
                    <h2 id="mainTitle" class="tracking-in-contract-bck"></h2>
                    <h3 id="subTitle"></h3>
                    <h6 id="title"></h6>
                    <p id="company"></p>
                    <p id="description"></p>
                    <div id="requirements"></div>
                    <p id="salary"></p>
                    <p id="location"></p>
                    <p id="phone"></p>
                    <p id="contact_email"></p>
                </div>

            </div>
        </div>

        <button type="submit" class="bouton-contact">send</button>
    </form>

    <script src="{{url('js/createjob.js')}}"></script>
@endsection
