@extends('masters.employerMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/homeEmployerTest.css') }}">
    <div class="titre-content">
        <div>
            <h1>Hello {{Auth::user()->name}}</h1>
            <h2> {{$title}}</h2>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="text-center">
            <div class="blur-out-expand-fwd">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-center">
                <div class="  bounce-top ">
                   {{$error}}
                </div>
            </div>
        @endforeach
    @endif
    <div class="container">

        @foreach($jobs as $job)
        <div class="card">
            <div class="img-box">
                <img src="https://image.flaticon.com/icons/svg/681/681611.svg" alt="Design" title="Design">
                <h3>
                    {{$job['course']['name']}}
                </h3>
                <h4> {{$job['category']['cat_name']}}</h4>
            </div>

            <div class="content">
                <p>
                    <i class="fas fa-heading"></i>
                    {{$job['title']}}
                </p>
                <p>
                    <i class="fa fa-briefcase"></i>
                    {{$job['company']}}
                </p>
                <p>
                    <i class="fa fa-map-marker"></i>
                    {{$job['location']}}
                </p>
                <div class="card-footer">
                    <a href ="editJob/{{$job['id']}}/course/{{$job['course']['id']}}" type="button" class="btn" id="left-panel-link" >Edit </a>
                <form action="{{url('studentCategory')}}" method="POST">
                    @csrf
                    <input type="hidden"  name="job_id" value={{$job['id']}}>
                    <input type="hidden" name="category_id" value="{{$job['category']['id']}}">
                    <input type="submit" class="btn" name="submit"  id="left-panel-link" value="All students">
                </form>
                <a href="job/delete/{{$job['id']}}" style=" background-color: rgba(172, 75, 96, 0.53);" type="button" class="btn button delete-confirm"data-toggle="modal" data-target="#exampleModal1" id="left-panel-link" onclick="deleteJob(this)" >Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<script>
    function deleteJob(data) {
        const url = data.href

        swal({
            title: 'Are you sure delete this job?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                axios({
                    method:'get',
                    url:url,
                }).then(({data})=>{
                    swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
                    location.reload()
                });

            }else{
                swal("Cancelled", "You dont deleted any post job:)", "error");
            }
        });
    }
</script>
@endsection
