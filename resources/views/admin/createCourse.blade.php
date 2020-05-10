@extends('masters.adminMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/createCourse.css') }}">
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>create new course and categories</h2>
            </div>
            <div class="row clearfix">
                <div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-heading"></i></span>
                            <input type=text id="course" placeholder="course name..." required />
                        </div>
                        <div class="input_field" id="parentCategories"> <span id="span"><i aria-hidden="true" onclick="addCategory(this)" class="fas fa-plus-square "></i></span>
                            <input type="text"  class="category" placeholder="category name..." required onblur="animatePluse()"/><br>
                        </div>
                        <input onclick="createNewCourse()" class="button" type="submit" value="Create new" />
                         <div class="errorMessage" style="color: red;font-size: 12px;text-align: center"></div>
                </div>
            </div>
        </div>
    </div>


{{--    <script src="{{asset('js/placement.js')}}"></script>--}}
@endsection
