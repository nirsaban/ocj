

// Setup graph
var chart = AmCharts.makeChart('chartdiv00',
	{
		"type": "serial",
		"categoryField": "category",
		"columnWidth": 0.7,
		"dataDateFormat": "",
		"plotAreaBorderColor": "#000000",
		"startDuration": 1,
		"startEffect": "easeOutSine",
		"sequencedAnimation": false,
		"addClassNames": true,
		"backgroundColor": "#FFFFFF",
		"hideBalloonTime": 152,
		"panEventsEnabled": false,
		"percentPrecision": 1,
		"theme": "dark",
		"color": "rgba(17,17,15,0.81)",
		"colors": [
				"#000000"
			],

		"categoryAxis": {
			"autoRotateAngle": 0,
			"classNameField": "",
			"labelColorField": "",
			"axisAlpha": 0.31,
			"dashLength": 0,
			"fontSize": 15,
			"gridCount": 0,
			"gridThickness": 0,
			"labelOffset": 5,
			"minHorizontalGap": 73,
			"tickLength": 0
		},
		"trendLines": [],
		"graphs": [
			{
				"colorField": "#000000",
				"fillAlphas": 1,
				"id": "AmGraph-1",
				"lineColorField": "color",
				"title": "graph 1",
				"type": "column",
				"valueField": "gain",
				"yearField": "category",
				"labelPosition": "inside",
				"color": "#FFFFFF",
				"balloonText": "[[value]]"
			}
		],
		"guides": [],
		"valueAxes": [
			{
				"id": "ValueAxis-1",
				"autoGridCount": false,
				"titleBold": false,
				"minimum": 0,
				"maximum": 20,
				"color":"#424242",
				"labelsEnabled": false
			}
		],
		"AmLegend": [
			{
				"fillColor":"#424242",
				"fillAlpha":"1",
			}
		],
		"allLabels": [],
		"balloon": {},
		"titles": [
			{
				"id": "Title-1",
				"text": "General status by course"
			}
		],
		"chartCursor": [
		{
			"cursorAlpha": 0,
		}
		],
		"dataProvider": [

      ]
	}
);
courses.map((course,key)=>{
    chart.dataProvider[key] = {category:course.name}
    console.log(chart.dataProvider[key])
})
console.log(chart.dataProvider)


chart.addListener( "rendered", updateHiLo);

$(function(){
	if ($('.data-row').find() == true) {
		updateGraph();
	}
});



function updateGraph() {

	if( document.getElementById('data-set').value == 'job' ) {
          courses.map((course,key) => {
              chart.dataProvider[key].gain = course.job.length
          })
	}
	else if ( document.getElementById('data-set').value == 'student' ) {

            courses.map((course,key) => {
            chart.dataProvider[key].gain = course.user.length
        })
	}
	else if ( document.getElementById('data-set').value == 'success' ) {
        courses.map((course,keyC) => {
            success.map((bingo,key) => {
                if(course.id == bingo.user.course_id)
                chart.dataProvider[keyC].gain = success.length
            })
        })
	}

  // Animate between values instead of resetting animation??
	chart.animateAgain();  // Resets animation
	// updateHiLo(); // updates highest and lowest values
	chart.validateData(); // redraws the chart with new data
}


function addCategory(elem){
    let input =  document.createElement('input');
    input.setAttribute('type','text')
    input.placeholder = 'add Category...'
    input.style.marginTop = '1rem';
    input.classList = 'category'
    document.getElementById('parentCategories').appendChild(input)
}
function animatePluse() {
    document.querySelector('.fa-plus-square').classList += 'wobble-hor-bottom';
}
function createNewCourse() {
    const err = document.querySelector('.errorMessage');
    err.textContent = '';
    const allCategories = document.querySelectorAll('.category');
    const categories = [];
    allCategories.forEach((category,key) => {
        if(category.value.length  > 1 ){
            categories[key] = category.value
        }
    })
    const courseName = document.getElementById('course');

    if(categories.length < 2 ){
        err.textContent = 'you must add minimum 2 categories'
    }else if(courseName.value.length < 2 ){
        err.textContent = 'you must add  2 characters to course name'
    }else{
        let url = location.origin + '/createCourse';
        let courseNameValue = document.getElementById('course').value;
        axios({method:'post',url:url,data:{course:courseNameValue,categories:categories}}).then(({data})=>{
            if(data === 'something faild'){
                Swal.fire("Error 500", "something faild please try again :(", "error");
            }else{
                Swal.fire("success Creating", "good job :)", "success").then(()=>{
                    location.reload();
                });
            }
        })
    }

}
function disabled(userId,jobId){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: `Are you sure ?`,
        text:  'disabled this profile student and job post?:( ! ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Disabled it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            let url = location.origin + '/disabled';
            axios({method:'post',url: url,
                data:{
                    userId:userId,
                    jobId:jobId,
                }}).then(({data})=>{
                Swal.fire({title: 'success Updated!',text: `${data}!`,icon: 'success'})
                location.reload()
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your category is safe :)',
                'error'
            )
        }
    })
}
