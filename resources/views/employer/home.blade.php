@extends('masters.employerMaster')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/homeEmployer.css') }}">
    <div class="container" style="margin-bottom: 8rem">
        <div class="header">
            <div class="mainTitle">Hello {{Auth::user()->name}}, {{$title}}</div>
            <h3 class="">{{$second_title}}-</h3>
            <select class="form-control col-md-5 form-control-lg custom-select" id="sortJobs" onchange="sortJobs(this)">
                <option>show all jobs</option>
                @foreach($courses as $course)
                    <option value="{{$course['id']}}">{{$course['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>

        <div id="jobsDiv"></div>


    </div>
        <script src="{{url('js/employer.js')}}"></script>
        <script>
            window.onload = function(){
              getData(courseId = null);
            }
            function getData(courseId = null){
                const baseUrl = location.origin;
                let url = location.origin + '/getJobs';
                axios({
                    method: 'post', url: url,
                    data: {
                        id: {{Auth::id()}},
                        courseId: courseId
                    }
                }).then(({data}) => {
                    if(courseId != null){
                    let allDiv = document.querySelectorAll('.JobsCard')
                        allDiv.forEach(divR => {
                            divR.parentNode.removeChild(divR);
                        })
                    }
                    data.forEach(item => {

                        let div = document.createElement('div')
                        div.classList ='JobsCard'
                        div.innerHTML +=  ` <div class="card">`+
                            `<div class="card-body">`+
                            `<h1 class="card-title">${item.course["name"]}</h1>`+
                            `<h2 class="card-title">${item.category['cat_name']}</h2>`+
                            `<ul class="list-group">`+
                            ` <li class="list-group-item list-group-item-success"><i class="fas fa-heading"></i>  ${item.title}</li>`+
                            ` <li class="list-group-item list-group-item-success"><i class="fa fa-briefcase"style="font-size:20px;"></i> ${item.company}$</li>`+
                            `<li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"style="font-size:20px;"></i>${item.location}</li>`+
                            ` <li class="list-group-item list-group-item-success des"><i class="fas fa-info"></i> ${item.description}</li>`+
                            `<li class="list-group-item list-group-item-success"><i class="fas fa-hand-holding-usd"></i> ${item.salary} </li>`+
                                 `</ul></div>`+
                                 ` <div class="card-footer">`+
                                  `<a href ="editJob/${item.id}/course/${item.course['id']}" type="button" class="btn" id="left-panel-link" >Edit </a>`+
                                 `<a href="job/delete/${item.id}"  type="button" class="btn button delete-confirm"data-toggle="modal" data-target="#exampleModal1" id="left-panel-link" onclick="deleteJob(this)" >Delete</a>`+

                                 `<a href="${baseUrl}/studentCategory/${item.category['id']}" type="button" class="btn"  id="left-panel-link">All student</a>`+
                                 `</div>`+
                                  `</div>`
                                jobsDiv.appendChild(div)
                          })
                });

            }
            function sortJobs(data) {
                    getData(parseInt(data.value))
            }
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

