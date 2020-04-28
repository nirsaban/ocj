

@extends('masters.placementMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}">
    <div class="container">
        <div class="row">
            <h2>All Courses</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.." title="Type in a name">
            <table id="myTable">
                <tr  class="header">
                    <th style="width:10%">#</th>
                    <th style="width:20%;">Course name</th>
                    <th style="width:40%;">categories</th>
                    <th style="width:5%;">students</th>
                    <th style="width:5%;">jobs</th>
                    <th style="width:10%;">edit</th>
                </tr>
                <?php $count  = 0;?>
                @foreach($courses as $course)
                    <?php $count++ ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td>{{$course['name']}}</td>
                        <td>
                            @foreach($course['category'] as $category)
                                @foreach($countCategoryUser as $key => $counter)
                                    @if($key ==  $category['cat_name'])
                                        {{$category['cat_name'].' '}}<span class="tags">{{$counter}}</span><br>
                                 @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td><i class="fas fa-user-graduate fa-2x"></i><span class="tags">{{$countCourseUser[$course['name']]}}</span></td>
                        <td><i class="fas fa-briefcase fa-2x"></i><span class="tags">{{$countCourseJob[$course['name']]}}</span></td>
                        <td>
                            <div class="col-1" >
                                <center>
                                    <a  href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}">edit</a>
                                </center>
                            </div>
                            <!-- Modal -->
{{--                            <div style="color: black" class="modal fade " id="myModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <center>--}}
{{--                                                <button type="button" class="btn btn-default" data-dismiss="modal">x</button>--}}
{{--                                            </center>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
{{--                                            <h4 class="modal-title" id="myModalLabel">More About {{$job['title']}}</h4>--}}

{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <center>--}}
{{--                                                <img  src="{{asset('images/jobImg.jpg')}}"  name="aboutme" width="140" height="140" class="img-circle">--}}
{{--                                                <h3 class="media-heading">{{$job['title']}}</h3>--}}
{{--                                                <h4 class="media-heading">{{$job['category']['cat_name']}}</h4>--}}
{{--                                                <h5 class="media-heading" >{{$job['company']}}</h5>--}}
{{--                                                <hr>--}}
{{--                                            </center>--}}
{{--                                            <center>--}}
{{--                                                <p class="text-left"><strong>description: </strong><br>--}}
{{--                                                    {{$job['description']}}</p>--}}
{{--                                                <br>--}}
{{--                                            </center>--}}
{{--                                            <hr>--}}
{{--                                            <center>--}}
{{--                                                <p class="text-left"><strong>requirements: </strong><br>--}}
{{--                                                    @foreach(json_decode($job['requirements']) as $require)--}}
{{--                                                        @if(strlen($require) > 2)--}}
{{--                                                            {{$require}}<br>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </p>--}}
{{--                                            </center>--}}
{{--                                            <hr>--}}
{{--                                            <center>--}}
{{--                                                <p class="text-left"><strong>Location: </strong><br>--}}
{{--                                                    {{$job['location']}}<br>--}}
{{--                                                </p>--}}
{{--                                            </center>--}}
{{--                                            <hr>--}}
{{--                                            <center>--}}
{{--                                                <p class="text-left"><strong>salary: </strong><br>--}}
{{--                                                    {{$job['salary']}}<br>--}}
{{--                                                </p>--}}
{{--                                            </center>--}}

{{--                                            <hr>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                @if($job['confirm'] == false)--}}
{{--                                                    <button class="btn btn-success" data-type="job" data-bool = true onclick="confirm('{{$job['id']}}',this.dataset)">Confirm this Profile</button>--}}
{{--                                                @else--}}
{{--                                                    <button class="btn btn-danger" data-type="job" data-bool = false onclick="confirm('{{$job['id']}}',this.dataset)">Block this profile</button>--}}
{{--                                                @endif--}}
{{--                                                <button type="button" data-dismiss="modal" value="Decline" class="btn btn-warning"  data-toggle="modal"  data-target="#declineModal_{{$count}}">Send message</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </td>--}}
                    </tr>


{{--                    <div class="modal fade" id="declineModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
{{--                                    <h4 class="modal-title float-md-left" id="myModalLabel">Write notes to the Employer for  her ad</h4>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <textarea id="errorMessage_{{$count}}" class="form-control"  rows="5" style="min-width: 100%"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="modal-footer">--}}
{{--                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                    <button type="button" class="btn btn-primary" onclick="sendErrorMessage('{{$job['user']['id']}}','{{$count}}')">send</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endforeach
            </table>
            <!-- Modal -->

        </div>
    </div>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <script >

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                if (td || td2 || td3 || td4) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1 ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



    </script>
    <script src="{{asset('js/sweet.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/placement.js')}}"></script>




@endsection
