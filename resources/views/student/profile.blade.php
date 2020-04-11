@extends('masters.studentMaster')
@section('content')
    <input type="hidden" id="idUser" value="{{Auth::id()}}" >
    <div class="container emp-profile">

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$name}}
                        </h5>
                        <div>

                            <i class="fas fa-edit" data-col="category_id" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="category_id" class=" fas fa-check-square" onclick= "update(this.dataset)" id="update"></i>
                            <h6 id="cat_name">
                         {{$cat_name ?? 'Your category'}}
                          </h6>
                        </div>


                        <select name="category_id" id="" class="cat" style="display:none">
                            <option value="">choose your category</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                            @endforeach
                        </select>

                        <i class="fas fa-edit "  id="editAbout" data-col="about_me" onclick="edit(this.dataset)" id="edit"></i><i data-id="{{Auth::id()}}" data-col ="about_me" class=" fas fa-check-square" onclick= "update(this.dataset)" id="update"></i>
                        <strong>
                            About:
                        </strong>
                        <div id="aboutParent">
                            <p class="p aboutMe">{{$allData[0]->about_me }}</p>
                        </div>
                        <strong>
                            education:
                        </strong>
                        <div class="educationParent">
                            <i data-col="education" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editEd"></i><i  data-id="<?=Auth::id()?>" data-col ="education" class=" fas fa-check-square updateEd" onclick="update(this.dataset)"></i><br>

                            <div id="pEdu">
                                <?php $count = 0 ?>
                                @foreach(json_decode($allData[0]->education) as $edu)
                                    <?php $count++ ; ?>
                                    @if(strlen($edu) > 2)
                                        <span>{{$count .'. '}}</span><p style="display: inline-block" class="h6 pEdu">{{$edu}}</p><br>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <strong>
                            Skills:
                        </strong>
                        <div class="skillsParent">
                            <i data-col="my_skills" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editSk"></i><i  data-id="<?=Auth::id()?>" data-col ="my_skills" class=" fas fa-check-square updateSk" onclick="update(this.dataset)"></i><br>
                           <div id="spansSkills">
                               @foreach(json_decode($allData[0]->my_skills) as $skill)
                                   @if(strlen($skill) > 2)
                                       <span class="tags">{{$skill}}</span>
                                   @endif
                            @endforeach
                           </div>
                        </div>
                        <div class="linksParent">
                            <i data-col="links" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editLi"></i><i  data-id="<?=Auth::id()?>" data-col ="links" class=" fas fa-check-square updateLi" onclick="update(this.dataset)"></i><br>
                            <div id="pLink">
                        <strong>WORK LINK</strong> <small>Max 3 links</small></br>
                            @foreach(json_decode($allData[0]->links) as $link)
                                @if(strlen($link) > 7)
                                    <p class="text-primary col-md-4 linksA"  onclick='test({{json_encode($link)}})'>{{$link}}</p>

                                @endif
                            @endforeach
                            </div>
                        </div>
    </div>

@endsection


