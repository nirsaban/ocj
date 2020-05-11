@extends('masters.adminMaster')
@section('content')
        <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">


    <main style="margin-top: 5rem" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="containerAdmin">
                <h1 class="display-3 text-center font-weight-bold font-italic" style="margin-bottom: 4rem" >Admin panel</h1>
            <div class="chart_area ">
                <select name="data-set" id="data-set" onchange="updateGraph();" class="text-center">
                    <option selected disabled>-- Filter By --</option>
                    <option value="job" selected>jobs</option>
                    <option value="student">student</option>
                    <option value="success" >Start of transaction</option>
                </select>
                <div id="chartdiv00" style="height: 360px; background-color: #f0f0f0; float: left;"></div>
            </div>


        </div>
        <div class="container tebleBingo ">
            <div class="row text-center">
                <h3 class="display-3  font-weight-bold font-italic" style="margin-bottom: 4rem;margin: 0 auto;" >bingo..</h3>
            </div>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for match.."
                       title="Type in a name">

                <table id="myTable" border="1px solid black" class="align-content-center">
                    <tr class="header ">
                        <th class="text-center" style="width:5%">#</th>
                        <th class="text-center" style="width:20%;">Course </th>
                        <th class="text-center" style="width:10%;">Name</th>
                        <th class="text-center" style="width:15%;">Company</th>
                        <th class="text-center" style="width:15%;">Job</th>
                        <th class="text-center" style="width:45%;">Little more</th>
                        <th class="text-center" style="width:10%;">disabled</th>
                    </tr>
                    <?php $count = 0;?>
                    @foreach($success as $bingo)
                        <?php $count++ ?>

                        <tr  @if($bingo['job']['confirm'] == 0 ) style="background-color:rgba(200,40,40,0.3);" @endif>
                            <td class="text-center font-weight-bold"><?= $count ?></td>
                            @foreach($courses as $course)
                                @if($bingo['user']['course_id'] == $course['id'])
                                    <td class="text-center font-weight-bolder ">{{$course['name']}}</td>
                                @else @continue;
                                @endif
                            @endforeach
                            <td class="text-center">{{$bingo['user']['name']}}</td>
                            <td class="text-center">{{$bingo['job']['company']}}</td>
                            <td class="text-center">{{$bingo['job']['title']}}</td>
                            <td>{{$bingo['status_message'] ?? 'no more..'}}</td>
                            @if($bingo['job']['confirm'] == 0 )
                                <td class="text-center" style="color: red"><i class="fas fa-minus-circle"></i> </td>
                            @else
                                <td class="text-center" disabled="true"><i class="fas fa-minus-circle" onclick="disabled('{{$bingo['user']['id']}}','{{$bingo['job']['id']}}')"></i> </td>
                            @endif
                        </tr>
                    @endforeach
                </table>

        </div>
    </main>


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
                if (td || td2) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



    </script>
    <script>
        const courses = <?php print_r(json_encode($courses));?>;
        const success = <?php print_r(json_encode($success));?>;
    </script>

@endsection
