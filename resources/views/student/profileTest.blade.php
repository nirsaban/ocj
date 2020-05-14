@extends('masters.studentMaster')
@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
    <input type="hidden" id="idUser" value="{{Auth::id()}}" >
    <div class="container" >


            <div class="reset1" onclick="resetProfile({{Auth::id()}})">
                @if(isset($profile[0]['confirm']))
                  @if($profile[0]['confirm'] == '0')
                    <span style="color:red">Waiting for confirm</span>
                    @else
                        <span  style="color:green"> confirm</span>
                    @endif
                @endif
                <div class="reset2" ></div>
            </div>


            <div class="reset" onclick="resetProfile({{Auth::id()}})">
                reset
                <div class="reset2" ></div>
            </div>
        <div class="main_title tracking-in-expand"> Profile</div>
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
                            <a class="linksA linkStyle" href="www.{{$link}}">{{$link}}</a><br>
                        @endif
                    @endforeach
                @endif
            </div>
            @include('student.partials.links')
        </div>
        <div class="work_experience_area ExperienceParent item">
            <div class="change_work_experience">
                <i data-toggle="modal" data-target="#myModalWorks" class="fas fa-edit" ></i><i  data-id="<?=Auth::id()?>" data-col ="work_experience" class=" fas fa-check-square updateEx" onclick="update(this.dataset)"></i><br>
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
    @if(isset($present))
        <script>
            const PRESENT =  <?php print_r(json_encode($present));?>
        </script>
    @endif
    @include('student.partials.works')


 @endsection
