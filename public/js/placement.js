
function sortMatches(data) {
    console.log(data.options[data.selectedIndex].text)
let allMatches = document.querySelectorAll('.row');
allMatches.forEach(match => {
 if(match.dataset.course != data.options[data.selectedIndex].text){
     match.classList.toggle('d-none')
 }else if(match.classList == 'row d-none'){
     match.classList.remove('d-none')
 }else if(data.options[data.selectedIndex].text == 'show all Matches'){

     match.classList.remove('d-none')
 }
})

}

function sendMessageToEmployer(name,title,student,userSend,id,student_id,job_id) {
    // const te = `Hey ${name} The job you love ${title} from ${company} company is interested in continuing with you. Please contact the placement department , welcome:${userSend} `;
    const message = ` Hi ${name} the student ${student}, who suited up for the job ${title}, also liked the job. contact me and move forward , welcome:${userSend}`;
    Swal.fire({
        title: `send message to ${name}`,
        text: message,
        showCancelButton: true,
        confirmButtonText: 'Send',
        showLoaderOnConfirm: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            let url = location.origin + '/sendMessage';
            axios({
                method: 'post', url: url,
                data: {
                    message: message,
                    user_id: id,
                    job_id:job_id,
                    student_id: student_id
                }
            }).then(({data}) => {
                if (data.trim() == 'you dont sent more than one message to this match') {
                    Swal.fire({
                        title: 'error!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    Swal.fire({title: 'Shortlisted!', text: `${data}!`, icon: 'success'});
                }
            });
        } else {
            Swal.fire("Cancelled", "You dont send any like:)", "error");
        }
    });
}
function sendMessageToStudent(name,title,company,job_id,student_id,userSend) {
    const message = `Hey ${name} The job you love ${title} from ${company} company is interested in continuing with you. Please contact the placement department , welcome:${userSend} `;
    Swal.fire({
        title: `send message to ${name}`,
        text: message,
        showCancelButton: true,
        confirmButtonText: 'Send',
        showLoaderOnConfirm: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            let url = location.origin + '/sendMessage';
            axios({
                method: 'post', url: url,
                data: {
                    message: message,
                    user_id: student_id,
                    job_id:job_id,
                    student_id: student_id
                }
            }).then(({data}) => {
                if (data.trim() == 'you dont sent more than one message to this match') {
                    Swal.fire({
                        title: 'error!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    Swal.fire({title: 'Shortlisted!', text: `${data}!`, icon: 'success'}).then(()=>{
                        location.reload()
                    });
                }
            });
        } else {
            Swal.fire("Cancelled", "You dont send any like:)", "error");
        }
    });
}
function checkProfileAndGetCategory(id,div){
    let url = location.origin + '/getCategory'
   axios({method:'post',url:url,data:{id:id}}).then(({data})=>{
   document.getElementById(`category_id${div}`).innerText += data;
   })
}
function sendErrorMessage(id,count){
    let message = document.getElementById(`errorMessage_${count}`).value;
    let url = location.origin + '/sendMessage'
    axios({method:'post',url:url,data:{user_id:id,message:message}}).then(({data})=>{
        Swal.fire({title: 'your message send!', text: `${data}!`, icon: 'success', position: 'top'}).then(()=>{
            location.reload()
        });
    })
}
function confirm(id,elem) {
    let url = location.origin + '/confirm'
    axios({method:'post',url:url,data:{id:id,type:elem['type'],bool:elem['bool']}}).then(({data})=>{
        Swal.fire({title: 'this profile confirmed now!', text: `${data}!`, icon: 'success', position: 'center'}).then(()=>{
            location.reload()
        });
    })
}
