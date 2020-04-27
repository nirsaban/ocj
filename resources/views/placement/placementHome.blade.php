@extends('masters.placementMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/placementHome.css') }}">
{{--    <div class="container text-center">--}}
{{--        <div class="main_title">--}}
{{--            <div class="titlePage">{{$title}}</div>--}}
{{--            <select class="form-control col-md-5 form-control-lg custom-select" id="sortJobs" onchange="sortMatches(this)">--}}
{{--                <option value="show">show all Matches</option>--}}
{{--                @foreach($courses as $course)--}}
{{--                    <option value="{{$course['id']}}">{{$course['name']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    <div class="studentsContainer container">--}}
{{--        @foreach($perfectMatches as $match)--}}
{{--<div data-course = "{{$match[0]['course']['name']}}"  class="row" >--}}
{{--            <div class="card cardStudent">--}}
{{--                <header>--}}
{{--                    <h1>{{$match[1]['name']}}</h1>--}}
{{--                    <h2>{{$match[0]['course']['name']}}</h2>--}}
{{--                    <h4>{{$match[0]['category']['cat_name']}}</h4>--}}
{{--                    <img  @if(isset($match[1]['profile']['image'])) src="{{asset('images/_'.$match[1]['id'].'/'.$match[1]['profile']['image'])}}" @else src="{{asset('images/avatar.jpg')}}"   @endif class="avatar" />--}}
{{--                </header>--}}
{{--                <footer>--}}
{{--                    <p class="cf">--}}
{{--                    <button onclick="sendMessageToStudent('{{$match[1]['name']}}','{{$match[0]['title']}}','{{$match[0]['company']}}','{{$match[0]['id']}}','{{$match[1]['id']}}','{{Auth::user()->name}}',)"  class="align-left share" ><i class="far fa-paper-plane"></i> Send Me a Message </button>--}}
{{--                    </p>--}}
{{--                </footer>--}}
{{--            </div>--}}
{{--    <div class="heart"><img   width="80px" height="70px"  src="{{asset('images/heart.svg')}}"></div>--}}
{{--            <div class="card carJob" >--}}
{{--                <header>--}}
{{--                    <h1>{{$match[0]['title']}}</h1>--}}
{{--                    <h2>{{$match[0]['company']}}</h2>--}}
{{--                </header>--}}
{{--                                <article style="text-align: center;overflow: auto">--}}
{{--                                    <p>{{$match[0]['description']}}</p>--}}
{{--                                </article>--}}
{{--                <footer>--}}
{{--                    <p class="cf">--}}
{{--                        <button  class="align-left share" onclick="sendMessageToEmployer('{{$match[0]['user']['name']}}','{{$match[0]['title']}}','{{$match[1]['name']}}','{{Auth::user()->name}}','{{$match[0]['user']['id']}}','{{$match[1]['id']}}',{{$match[0]['id']}})" ><i class="far fa-paper-plane"></i> Send Me a Message </button>--}}
{{--                    </p>--}}
{{--                </footer>--}}
{{--            </div>--}}
{{--</div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

<div class="container">
        <div class="row">
            <h2>My match</h2>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.." title="Type in a name">
            <table id="myTable">
                <tr class="header">
                    <th>#</th>
                    <th style="width:20%;">course</th>
                    <th style="width:20%;"> job</th>
                    <th style="width:10%;">send message</th>
                    <th style="width:20%;"><3</th>
                    <th style="width:20%;">student</th>
                    <th style="width:10%;">send message</th>

                </tr>
                <?php $count  = 0;?>
                @foreach($perfectMatches as $match)
                <?php $count++ ?>
                <tr>
                    <td><?= $count ?></td>
                    <td>{{$match[0]['course']['name']}}</td>
                    <td>{{$match[1]['name']}}</td>
                    <td><button onclick="sendMessageToStudent('{{$match[1]['name']}}','{{$match[0]['title']}}','{{$match[0]['company']}}','{{$match[0]['id']}}','{{$match[1]['id']}}','{{Auth::user()->name}}',)"  class="align-left share" ><i class="far fa-paper-plane"></i> </button>
                    </td>
                    <td><img   width="80px" height="70px"  src="{{asset('images/heart.svg')}}"></td>
                    <td>{{$match[1]['name']}}</td>
                    <td> <button  class="align-left share" onclick="sendMessageToEmployer('{{$match[0]['user']['name']}}','{{$match[0]['title']}}','{{$match[1]['name']}}','{{Auth::user()->name}}','{{$match[0]['user']['id']}}','{{$match[1]['id']}}',{{$match[0]['id']}})" ><i class="far fa-paper-plane"></i>  </button>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>

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
