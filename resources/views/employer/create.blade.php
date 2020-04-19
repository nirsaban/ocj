@extends('masters.employerMaster')
@section('content')
    <h1>Create a new job</h1>

    <form action="{{url('/job/create')}}" method="POST">
        @csrf

        <h1>Please fill all inputs !</h1>
        <div class="contentform">
            <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
            <div class="leftcontact">
                <div id ="sub&main">

                <div class="form-group">
                    <p>main title<span>*</span></p>
                 <select class="course form-control form-control-sm mainTitle @error('course_id') is-invalid @enderror" id="courseRegister" name="course_id">
                     <option value="default">main subject</option>
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
                    <input type="text" name="title" onblur="addInput(this)" class="@error('title') is-invalid @enderror"/>
                    @error('title')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <p> Comapny Name <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-building"></i></span>
                    <input type="text" name="company" onblur="addInput(this)" class="@error('company') is-invalid @enderror" />
                    @error('company')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <p>description <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-info-circle"></i></span>
                    <textarea  name="description"  class="description @error('description') is-invalid @enderror" onblur="addInput(this)"></textarea>
                    @error('description')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" >
                    <div id="requirementsAll">
                    <p>Requirements <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-hammer"></i></span>
                    <input type="text" class="require  @error('requirements') is-invalid @enderror" name="requirements" id="reqIn"  data-rule="required"  placeholder="add require..."/><span class="icon-case changeToSave" id="disabledPlus"><i class="fas fa-plus-square "    onclick="addRequire()"></i></span><span class="icon-case changeToSave" id="disabled" style="display: none"><i class="fas fa-vote-yea" onclick="saveAllRequire()"   ></i></span>
                   </div>
                    @error('requirements')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <p>Salary <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-dollar-sign"></i></span>
                    <input type="text" name="salary" id="currency-field" class="@error('salary') is-invalid @enderror"  data-type="currency" placeholder="₪6,000" onblur="addInput(this)">
                    @error('salary')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <p>Company Address <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" name="location" class="@error('location') is-invalid @enderror"  data-rule="required" onblur="addInput(this)" placeholder=" Dizengoff 3,Tel-Aviv "/>
                    @error('location')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <p>phone <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-home"></i></span>
                    <input type="tel"  onblur="addInput(this)"  name="phone" placeholder="this format: 03-1234567" pattern="^0\d([\d]{0,1})([-]{0,1})\d{7}$" class="@error('location') is-invalid @enderror"  >
                    @error('phone')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <p>E-mail <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-envelope"></i></span>
                    <input type="email" onblur="addInput(this)" name="email"  class="@error('location') is-invalid @enderror" />
                    @error('email')
                    <div class="validation">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="rightcontact">

                <div class="contentJob">
                    <div class="reset" onclick="resetForm()">
                        reset
                        <div class="reset2" ></div>
                    </div>
                    <small style="letter-spacing: .4rem">live demo</small>
                    <h2 id="mainTitle" class="tracking-in-contract-bck"></h2>
                    <h4 id="subTitle"></h4>
                    <h6 id="title"></h6>
                    <p id="company"></p>
                    <p id="description"></p>
                    <div id="requirements"></div>
                    <p id="salary"></p>
                    <p id="location"></p>
                    <p id="phone"></p>
                    <p id="email"></p>
                </div>

            </div>
        </div>

        <button type="submit" class="bouton-contact">send</button>
    </form>


@endsection
