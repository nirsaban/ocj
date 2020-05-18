@extends('masters.studentMaster')
@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
    <input type="hidden" id="idUser" value="{{Auth::id()}}" >
    <div class="container" >
        <i class="fas fa-cogs" data-toggle="modal" data-target="#myModal"></i>
            <div class="reset1" onclick="resetProfile({{Auth::id()}})">

                <div class="reset2" ></div>
            </div>


            <div class="reset" onclick="resetProfile({{Auth::id()}})">
                reset
                <div class="reset2" ></div>
            </div>
        <div class="main_title tracking-in-expand"> {{Auth::user()->name}}Profile</div>
        <div class="image_area ">
            @if(isset($profile[0]['image']))
                <img src="{{asset('images/_'.Auth::id().'/'.$profile[0]['image'])}}" class="profile_image"/>
            @else
                <img src="{{asset('images/avatar.jpg')}}"  alt="" class="profile_image">
            @endif
                <form  action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Auth::id()}}">
                <div class="custom-file" style="font-size: .7rem">
                    <input  type="file" name="image" class="custom-file-input" id="inputGroupFile04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    <div class="btn-change"><button style="color:red" class="button-change third ">add photo</button> </div>
                </div>
            </form>
        </div>
        <div class="category_area item">
            <div class="change_category">
                <i class="fas fa-edit" data-toggle="modal" data-target=".bs-example-modal-new"></i>
                <div class="default">my category</div>
                <div class="category_name ">{{$profile[0]['category']['cat_name'] ?? 'Your category'}}</div>
            </div>
            @include('student.partials.category')
        </div>
        <div class="about_me_area item" id="aboutParent">
            <div class="change_about_me">
                <i class="fas fa-edit " data-target="#aboutMeModal" data-toggle="modal"></i>
                <div class="default">
                    about me
                </div>
            </div>
            <div class="about_me_content aboutMe">
                    {{$profile[0]['about_me'] ?? ''}}
            </div>
            @include('student.partials.about_me')
        </div>
        <div class="education_area item educationParent">
            <div class="change_education">
                <i data-toggle="modal" data-target="#myModalEducation" class="fas fa-edit" ></i>
            </div>
            <div class="default">
                my educations
            </div>
            <div class="education_content  " id="pEdu" >
                <?php $count = 0 ?>
                @if(isset($profile[0]['education']))
                    @foreach(json_decode($profile[0]['education']) as $edu)
                        <?php $count++ ; ?>
                        @if(strlen($edu) > 2)
                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu ">{{$edu}}</p><br>
                        @endif
                    @endforeach
                @endif
            </div>
            @include('student.partials.educations')
        </div>
        <div class="my_skills_area item skillsParent">
            <div class="change_my_skills">
                <i data-toggle="modal" data-target="#myModalSkills" class="fas fa-edit" ></i>
            </div>
            <div class="default">
                my skills
            </div>
            <div class="my_skills_content" id= "spansSkills">
                @if(isset($profile[0]['my_skills']))
                    @foreach(json_decode($profile[0]['my_skills']) as $skill)
                        @if(strlen($skill) > 2)
                            <span class="tags">{{$skill}}</span>
                        @endif
                    @endforeach
                @endif
            </div>
            @include('student.partials.skills')
        </div>
        <div class="links_area item linksParent">
            <div class="change_links">
                <i data-toggle="modal" data-target="#myModalLinks" class="fas fa-edit" ></i>
            </div>
            <div class="default">
                My best project links
            </div>
            <div class="links_content"  id="pLink">
                @if(isset($profile[0]['links']))
                    @foreach(json_decode($profile[0]['links'])  as $link)
                        @if(strlen($link) > 7)
                            <a class="linksA linkStyle" onclick="window.location.href = 'https://{{$link}}'">{{$link}}</a><br>
                        @endif
                    @endforeach
                @endif
            </div>
            @include('student.partials.links')
        </div>
        <div class="work_experience_area ExperienceParent item">
            <div class="change_work_experience">
                <i data-toggle="modal" data-target="#myModalWorks" class="fas fa-edit" ></i> <br>
            </div>
            <div class="default">
                My Work experience
            </div>
            <div class="work_experience_content" id="pEx">
                <?php $count = 0 ?>
                @if(isset($profile[0]['work_experience']))
                    @foreach(json_decode($profile[0]['work_experience']) as $work)
                        <?php $count++ ; ?>
                        @if(strlen($work) > 2)
                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEx">{{$work}}</p><br>
                        @endif
                    @endforeach
                @endif

            </div>

        </div>
        <div class="compliteProf">
             <div data-color = "rgba(255, 0, 0, 0.2)" class="category_id item">Category</div>
             <div data-color = "rgba(255, 0, 0, 0.4)" class="about_me item">about</div>
             <div data-color = "rgba(255, 0, 0, 0.5)" class="education item">education</div>
             <div data-color = "rgba(255, 0, 0, 0.6)" class="my_skills item">skills</div>
             <div data-color = "rgba(255, 0, 0, 0.7)" class="links item">links</div>
             <div data-color = "rgba(255, 0, 0, 0.8)" class="work_experience item" >works</div>
             <div  data-color = "rgba(255, 0, 0, 0.9)" class="image item">image</div>
             <div style="font-size: 1.7rem"  class="present item">0%</div>
           </div>
       </div>

            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                            <div class="tabs" id="tab01">
                                <h6 class="text-muted">My Profile</h6>
                            </div>
                            <div class="tabs active" id="tab02">
                                <h6 class="font-weight-bold">Change Password</h6>
                            </div>
                            <div class="tabs" id="tab03">
                                <h6 class="text-muted">Category Info</h6>
                            </div>
                            <div class="tabs" id="tab04">
                                <h6 class="text-muted">Course info</h6>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="modal-body p-0">
                            <fieldset id="tab011">

                                <div class="px-3">

                                    <h4 style="margin-top: 2rem" class="text-primary pb-2"><a href="#">viewed my profile</a> <span class="text-secondary">- {{$watches}}  job post</span></h4>
                                    <h4 class="text-primary pb-4"><a href="#">Status</a> <span class="text-secondary">- @if(isset($profile[0]['confirm']))
                                                @if($profile[0]['confirm'] == '0')
                                                    <span style="color:red">Waiting for confirm</span>
                                                @else
                                                    <span  style="color:green"> confirm</span>
                                                @endif
                                            @endif</span></h4>
                                </div>
                            </fieldset>
                            <fieldset class="show" id="tab021">
                                <div class="bg-light">
                                    <h5 class="text-center mb-4 mt-0 pt-4">Fill the input</h5>
                                    <div class="card">


                                        <div class="card-body">
            @if(session()->has('message'))
                <script>
                    $(window).load(function() {
                        $('#myModal').modal('show');
                    });
                </script>
             <div class="blur-out-expand-fwd text-center">
                 <small class="text-center font-weight-bold" style="font-size: 1.2rem">{{ session()->get('message') }}</small>
             </div>
         @endif
         <form method="POST" action="{{ route('change.password') }}">
             @csrf
             @if($errors->any())
                 <script>
                     $(window).load(function() {
                         $('#myModal').modal('show');
                     });
                 </script>
             @foreach ($errors->all() as $error)
                 <p class="text-danger"style="font-size: 1.2rem">{{ $error }}</p>
             @endforeach
             @endif
             <div class="form-group row">
                 <label for="password" class="col-md-4 col-form-label text-md-right"><small >Current </small></label>
                 <div class="col-md-6">
                     <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" >
                     <span style="font-size: 1.2rem;color: red" id="currentPass"></span>
                 </div>
             </div>
             <div class="form-group row">
                 <label for="password" class="col-md-4 col-form-label text-sm-right"><small>New </small></label>
                 <div class="col-md-6">
                     <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" >
                 </div>
             </div>
             <div class="form-group row">
                 <label for="password" class="col-md-4 col-form-label text-md-right"><small>Repeat</small></label>
                 <div class="col-md-6">
                     <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" onkeyup="checkPassword(this)" autocomplete="current-password">
                 </div>
             </div>

             <div class="form-group row mb-0">
                 <div class="col-md-8 offset-md-4">
                     <button type="submit" class="btn btn-primary">
                         Update Password
                     </button>
                 </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="tab031">
                                <div class="bg-light">
                                    <h5 class="text-center mb-4 mt-0 pt-4">Info about {{$profile[0]['category']['cat_name'] ?? 'you must choose category'}}</h5>
                                </div>
                                <div class="px-3">
                                    <div class="border border-1 box">

                                        <p class="text-muted mb-1">Students : <strong>{{$StudentCategory}}</strong></p>
                                    </div>
                                    <div class="border border-1 box">
                                        <p class="text-muted mb-1 text-sm-left">Jobs : <strong>{{$allJobCat}}</strong></p>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="tab041">
                                <div class="bg-light">
                                    <h5 class="text-center mb-4 mt-0 pt-4">Info about {{$courseName}}</h5>
                                </div>
                                <div class="px-3">
                                    <div class="border border-1 box">
                                        <p class="text-muted mb-1">Students : <strong>{{$studentCourse}}</strong></p>
                                    </div>
                                    <div class="border border-1 box">
                                        <p class="text-muted mb-1 text-sm-left">Jobs : <strong>{{$jobsCourse}}</strong></p>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="line"></div>
                        <div class="modal-footer d-flex flex-column justify-content-center border-0">
                            <p class="text-muted">{{Auth::user()->name}} profile</p>
                        </div>
                    </div>
                </div>

        </div>

    @if(isset($present))
        <script>
            const PRESENT =  <?php print_r(json_encode($present));?>
        </script>
    @endif
    @include('student.partials.works')


 @endsection
