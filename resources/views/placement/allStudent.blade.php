@extends('masters.placementMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}">
    <div class="container">
        <div class="row">
            <h2>All student</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.." title="Type in a name">
            <table id="myTable">
                <tr class="header">
                    <th style="width:10%">#</th>
                    <th style="width:30%;">course</th>
                    <th style="width:30%;">name</th>
                    <th style="width:10%;">go To my Profile</th>
                </tr>
                <?php $count  = 0;?>
                @foreach($allStudent as $student)
                    @if(!$student['profile']['category_id'])
                        @continue
                    @else
                    <?php $count++ ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td>{{$student['course']['name']}}</td>
                        <td>{{$student['name']}}</td>
                        <td>
                                <div class="col-1" >
                                    <center>
                                        <a onclick="checkProfileAndGetCategory('{{$student['id']}}','{{$count}}')" href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}"><img @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle"></a>
                                    </center>
                                </div>
                                <!-- Modal -->
                                <div  class="modal fade " id="myModal_{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <center>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">x</button>
                                                </center>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="myModalLabel">More About {{$student['name']}}</h4>

                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <img @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle">
                                                    <h3 class="media-heading">{{$student['name']}}</h3>
                                                    <h4 class="media-heading" id="category_id{{$count}}"></h4>
                                                    @if(isset($student['profile']['my_skills']))
                                                    <span><strong>Skills: </strong></span>
                                                        @foreach(json_decode($student['profile']['my_skills']) as $skill)
                                                            @if(strlen($skill) > 2)
                                                                <span class="label label-warning">{{$skill}}</span>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <br>
                                                </center>
                                                <hr>
                                                <center>
                                                    @if(isset($student['profile']['about_me']))
                                                        <p class="text-left"><strong>About me: </strong><br>
                                                            {{$student['profile']['about_me']}}
                                                            <br>
                                                    @endif
                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['links']))
                                                        <p class="text-left"><strong>work Link: </strong><br>
                                                            @foreach(json_decode($student['profile']['links']) as $link)
                                                                @if(strlen($link) > 2)
                                                                    <a href="{{$link}}">{{$link}}</a><br>
                                                    @endif
                                                    @endforeach
                                                    @endif

                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['my_skills']))
                                                        <p class="text-left"><strong>Education: </strong><br>
                                                        @foreach(json_decode($student['profile']['education']) as $edu)
                                                            @if(strlen($edu) > 2)
                                                                {{$edu}}<br>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </center>
                                                <hr>
                                                </center>
                                                <center>
                                                    @if(isset($student['profile']['work_experience']))
                                                        <p class="text-left"><strong>Works: </strong><br>
                                                            @foreach(json_decode($student['profile']['work_experience']) as $work)
                                                                @if(strlen($work) > 2)
                                                                    {{$work}}<br>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </center>
                                            <div class="modal-footer">
                                            <button class="btn btn-success">Confirm this Profile</button>
                                             <button class="btn btn-danger">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </td>
                    </tr>
                    @endif
                @endforeach
            </table>

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
                td3 = tr[i].getElementsByTagName('td')[5];
                if (td || td2 || td3) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1 || txtValue3.toUpperCase().indexOf(filter)   > -1) {
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


