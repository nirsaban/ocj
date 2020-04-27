@extends('masters.employerMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/studentByCategory.css') }}">
    <div class="container">
        <div class="like">
            <div class="titleLike">Did you like my profile? Mark like And maybe we'll meet soon -> <span class="LikeIcon"> <i class="far fa-thumbs-up fa-1x" style="color:#1b4b72;" onclick="addLikeToStudent(1,'{{$id}}','{{$job_id}}')"></i></span></div>
        </div>
        <div class="main_title tracking-in-expand">{{$name}} Profile</div>
        <div class="image_area ">
            @if(isset($allData[0]->image))
                <img src="{{asset('images/_'.$id.'/'.$allData[0]->image)}}" class="profile_image"/>
            @else
                <img src="{{asset('images/avatar.jpg')}}"  alt="" class="profile_image">
            @endif
            <form  action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="category_area item">
            <div class="change_category">
                <div class="default">my category</div>
                <div class="category_name ">{{$cat_name ?? 'Your category'}}</div>
            </div>
            <select name="category_id" id="" class="cat form-control col-6 form-control-sm"  style="display:none">
                <option value="">choose your category</option>
                @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                @endforeach
            </select>

        </div>
        <div class="about_me_area item" id="aboutParent">
            <div class="change_about_me">
                <div class="default">
                    about me
                </div>
            </div>
            <div class="about_me_content aboutMe">
                @if(isset($allData[0]->about_me))
                    {{$allData[0]->about_me}}
                @endif
            </div>
        </div>
        <div class="education_area item educationParent">
            <div class="change_education">
            </div>
            <div class="default">
                my educations
            </div>
            <div class="education_content  " id="pEdu" >
                <?php $count = 0 ?>
                @if(isset($allData[0]->education))
                    @foreach(json_decode($allData[0]->education) as $edu)
                        <?php $count++ ; ?>
                        @if(strlen($edu) > 2)
                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu ">{{$edu}}</p><br>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="my_skills_area item skillsParent">
            <div class="change_my_skills">
            </div>
            <div class="default">
                my skills
            </div>
            <div class="my_skills_content" id= "spansSkills">
                @if(isset($allData[0]->my_skills))
                    @foreach(json_decode($allData[0]->my_skills) as $skill)
                        @if(strlen($skill) > 2)
                            <span class="tags">{{$skill}}</span>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="links_area item linksParent">
            <div class="change_links">
            </div>
            <div class="default">
                My best project links
            </div>
            <div class="links_content"  id="pLink">
                @if(isset($allData[0]->links))
                    @foreach(json_decode($allData[0]->links)  as $link)
                        @if(strlen($link) > 7)
                            <a class="linksA linkStyle" href="">{{$link}}</a><br>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="work_experience_area ExperienceParent item">
            <div class="default">
                My Work experience
            </div>
            <div class="work_experience_content" id="pEx">
                <?php $count = 0 ?>
                @if(isset($allData[0]->work_experience))
                    @foreach(json_decode($allData[0]->work_experience) as $work)
                        <?php $count++ ; ?>
                        @if(strlen($work) > 2)
                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEx">{{$work}}</p><br>
                        @endif
                    @endforeach
                @endif

            </div>

        </div>
        <script src="{{asset('js/employer.js')}}"></script>
@endsection




