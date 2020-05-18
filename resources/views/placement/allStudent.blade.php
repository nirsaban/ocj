@extends('masters.placementMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}">


      <div class="container ">
            <div class="row">
            <h2>All student</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.." title="Type in a name">
                <table id="myTable" border="1px solid black">
                    <tr  class="header">
                    <th style="width:10%">#</th>
                    <th style="width:30%;">course</th>
                    <th style="width:30%;">name</th>
                    <th style="width:10%;"> My Cv File </th>
                    <th style="width:10%;">go To my Profile</th>
                </tr>
                <?php $count  = 0;?>
                @foreach($allStudent as $student)
                    @if(!$student['profile']['category_id'])
                        @continue
                    @else
                    <?php $count++ ?>
                    <tr @if($student['profile']['confirm'] == false) style="color:red;background-color: rgba(255,3,18,0.1)" @endif>
                        <td><?= $count ?></td>
                        <td>{{$student['course']['name']}}</td>
                        <td>{{$student['name']}}</td>
                        <td> <a href="#"  data-toggle="modal" data-target="#basicModal_{{$count}}">Click to open my Cv</a></td>
                        <td><div class="col-1" ><center> <a onclick="checkProfileAndGetCategory('{{$student['id']}}','{{$count}}')" href="#aboutModal" data-toggle="modal" data-target="#myModal_{{$count}}"><img @if($student['profile']['confirm'] == false) style="border:2px solid red" @endif @if(isset($student['profile']['image'])) src="{{asset('images/_'.$student['id'].'/'.$student['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}" @endif name="aboutme" width="140" height="140" class="img-circle"></a></center></div>
                        </td>
                        @include('placement.partials.profileModal')
                        @include('placement.partials.cvModal')

                    </tr>
                    @endif
                    @include('placement.partials.messageModal')
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
                if (td || td2 ) {
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


