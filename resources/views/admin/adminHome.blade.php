@extends('masters.adminMaster')
@section('content')


    <main style="margin-top: 5rem" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 class="display-3 text-center" style="margin-bottom: 4rem" >Admin panel</h1>
        <select name="data-set" id="data-set" onchange="updateGraph();">
            <option value="job" selected>jobs</option>
            <option value="student">student</option>
            <option value="success" >success</option>
        </select>

<div id="chartdiv00" style="height: 360px; background-color: #f0f0f0; float: left;"></div>

    </main>

    <script>
        const courses = <?php print_r(json_encode($courses));?>;
        const success = <?php print_r(json_encode($success));?>;
    </script>
@endsection
