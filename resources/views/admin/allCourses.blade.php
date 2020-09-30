@extends('masters.adminMaster')
@section('content')
    <main style="margin-top: 5rem" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
    <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}">
    <div class="container ">
        <div class="row">
            <h2>All Courses</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.."
                   title="Type in a name">
            <table id="myTable" border="1px solid black" class="align-content-center">
                <tr class="header ">
                    <th class="text-center" style="width:5%">#</th>
                    <th class="text-center" style="width:10%;">Course name</th>
                    <th class="text-center" style="width:15%;">categories</th>
                    <th class="text-center" style="width:5%;">students</th>
                    <th class="text-center" style="width:5%;">jobs</th>
                </tr>
                <?php $count = 0;?>
                @foreach($courses as $course)
                    <?php $count++ ?>
                    <tr>
                        <td class="text-center font-weight-bold"><?= $count ?></td>
                        <td class="text-center font-weight-bolder ">{{$course['name']}}
                            <i data-toggle="modal" data-target="#exampleModal_{{$count}}" class="far fa-edit"></i>
                            <i class="fas fa-trash-alt" onclick="deleteCourse('{{$course['id']}}',this.dataset)" data-courseName='{{$course['name']}}'></i>
                        </td>
                        <td class="text-center " id="flexText">
                            <?php $countCat = 0;?>
                            @foreach($course['category'] as $category)
                                @foreach($countCategoryUser as $key => $counter)
                                    @foreach($countCategoryJob as $name => $num)
                                        @if($key ==  $category['cat_name'] && $name ==  $category['cat_name'] )
                                            <?php $countCat++; ?>
                                            {{$category['cat_name'].' '}}
                                     <i data-toggle="modal" data-target="#exampleModalCategory_{{$category['id']}}" class="far fa-edit"></i>
                                     <i class="fas fa-trash-alt" onclick="deleteCategory('{{$category['id']}}','{{$category['cat_name']}}')"></i>
                                            <div class="tags">
                                                <i class="fas fa-user-graduate "></i>{{$counter}} ,
                                                <i class="fas fa-briefcase "></i> {{$num}}</div><br>
                                            @include('admin.partials.EditCategory')
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach


                        </td>
                        <td class="text-center"><i class="fas fa-user-graduate fa-2x"></i><span
                                class="tags">{{$countCourseUser[$course['name']]}}</span></td>
                        <td class="text-center"><i class="fas fa-briefcase fa-2x"></i><span
                                class="tags">{{$countCourseJob[$course['name']]}}</span></td>

                    </tr>


                    <!-- Modal -->
                    @include('admin.partials.EditCourse')
                @endforeach
            </table>
        </div>
    </div>

    {{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>--}}
    {{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <!------ Include the above in your HEAD tag ---------->


    <script>

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                if (td || td2) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/placement.js')}}"></script>




@endsection
