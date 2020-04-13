@extends('masters.studentMaster')
@section('content')
    <input type="hidden" id="idUser" value="{{Auth::id()}}" >
    <div class="container emp-profile">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        @if(isset($allData[0]->image))
                        <img src="{{asset('images/_'.Auth::id().'/'.$allData[0]->image)}}"/>
                            @else
                            <img src="{{asset('images/avatar.jpg')}}"/>
                        @endif
                        <div class="file btn btn-lg btn-primary">
                            <form  action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                            Change Photo
                                <input type="file" name="image" class="form-control">
                                <input type="hidden" name="id" value="{{Auth::id()}}">
                        </div>
                    </div><br>
                    <div class="profile-img">
                        <input type="submit"  class="file btn btn-lg btn-primary upload-image" name="submit" value="add photo">
                    </div>
                    </form>
                    <br>
                </div>

                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$name}}
                        </h5>
                        <div>
                            <i class="fas fa-edit" data-col="category_id" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="category_id" class=" fas fa-check-square" onclick= "update(this.dataset)" id="update"></i>
                            <h6 id="cat_name" class="text-dark">
                        <span class="font-weight-bold">Student Category </span><br> {{$cat_name ?? 'Your category'}}
                          </h6>
                        </div>


                        <select name="category_id" id="" class="cat" style="display:none">
                            <option value="">choose your category</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                            @endforeach
                        </select>

                        <i class="fas fa-edit "  id="editAbout" data-col="about_me" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="about_me" class=" fas fa-check-square updateAbout" onclick= "update(this.dataset)" id="update"></i><br>
                        <strong>
                            About:
                        </strong>
                        <div id="aboutParent">
                            <p class="p aboutMe">
                            @if(isset($allData[0]->about_me))
                            {{$allData[0]->about_me}}
                            @endif
                            </p>
                        </div>

                        <i data-col="work_experience" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editEx"></i><i  data-id="<?=Auth::id()?>" data-col ="work_experience" class=" fas fa-check-square updateEx" onclick="update(this.dataset)"></i><br>
                        <strong>
                            Work Experience
                        </strong>
                        <div class="ExperienceParent">
                            <div id="pEx">
                                <?php $count = 0 ?>
                                    @if(isset($allData[0]->work_experience))
                                @foreach(json_decode($allData[0]->work_experience) as $work)
                                    <?php $count++ ; ?>
                                    @if(strlen($work) > 2)
                                        <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu">{{$work}}</p><br>
                                    @endif
                                @endforeach
                              @endif
                            </div>
                        </div>
                        <i data-col="education" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editEd"></i><i  data-id="<?=Auth::id()?>" data-col ="education" class=" fas fa-check-square updateEd" onclick="update(this.dataset)"></i><br>
                        <strong>
                            education:
                        </strong>
                        <div class="educationParent">

                            <div id="pEdu">
                                <?php $count = 0 ?>
                                @if(isset($allData[0]->education))
                                    @foreach(json_decode($allData[0]->education) as $edu)
                                        <?php $count++ ; ?>
                                        @if(strlen($edu) > 2)
                                            <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu">{{$edu}}</p><br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <strong>
                            Skills:
                        </strong>
                        <div class="skillsParent">
                            <i data-col="my_skills" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editSk"></i><i  data-id="<?=Auth::id()?>" data-col ="my_skills" class=" fas fa-check-square updateSk" onclick="update(this.dataset)"></i><br>
                           <div id="spansSkills">
                               @if(isset($allData[0]->my_skills))
                               @foreach(json_decode($allData[0]->my_skills) as $skill)
                                   @if(strlen($skill) > 2)
                                       <span class="tags">{{$skill}}</span>
                                   @endif
                            @endforeach

                            @endif
                           </div>
                        </div>
                        <div class="linksParent">
                            <i data-col="links" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editLi"></i><i  data-id="<?=Auth::id()?>" data-col ="links" class=" fas fa-check-square updateLi" onclick="update(this.dataset)"></i><br>
                            <strong>WORK LINK</strong> <small>Max 3 links</small></br>
                            <div id="pLink">

                                @if(isset($allData[0]->links))
                            @foreach(json_decode($allData[0]->links)  as $link)
                                @if(strlen($link) > 7)
                                    <p class="text-primary col-md-4 linksA"  onclick='test({{json_encode($link)}})'>{{$link}}</p>
                                @endif
                            @endforeach
                                @endif
                              </div>
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
                        <div class="present item">present</div>
                    </div>

@if(isset($present))
                    <script>
                        const PRESENT =  <?php print_r(json_encode($present));?>
                    </script>
@endif
@endsection


