function addLikeToStudent(rilation,beloved,love){
    swal({
        title: "Are you sure you like this Student?",
        text: "if you add like this is send to placement...",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am like this Student!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            let url = location.origin + '/addLike';
            axios({method:'post',url: url,
                data:{
                    beloved:beloved,
                    love:love,
                    rilation:rilation
                }}).then(({data})=>{
                if(data.trim() == 'You dont can send more then 1 like'){
                    swal({
                        title: 'Shortlisted!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                }
                else{
                    swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
                    like =  document.querySelector('.fa-thumbs-up')
                    like.style.color = 'red'
                    like.style.transform = 'rotate(15deg)';
                }
            });
        } else {
            swal("Cancelled", "You dont send any like:)", "error");
        }
    });

}
// const readMore = (e,) => {
//     if(e.textContent == 'View more'){
//         e.textContent = 'X'
//     }else {
//         e.textContent = 'View more'
//     }
//     let parent = e.parentNode;
//     parent.classList.toggle('JobsCard-active');
//     document.querySelector('.Overlayer').classList.toggle('Overlayer-active');
//     let none = document.querySelectorAll('.none');
//     none.forEach(details =>{
//         details.classList.toggle('block');
//     })
// };
//
// function addLikeTojob(beloved,love){
//     var form = this;
//     swal({
//         title: "Are you sure you like this job?",
//         text: "if you add like this is send to placement...",
//         icon: "warning",
//         buttons: [
//             'No, cancel it!',
//             'Yes, I am like this job!'
//         ],
//         dangerMode: true,
//     }).then(function(isConfirm) {
//         if (isConfirm) {
//             let url = location.origin + '/addLike';
//             axios({method:'post',url: url,
//                 data:{
//                     beloved:beloved,
//                     love:love
//                 }}).then(({data})=>{
//                 if(data.trim() == 'You dont can send more then 1 like'){
//                     swal({
//                         title: 'Shortlisted!',
//                         text: `${data}!`,
//                         icon: 'error'
//                     })
//                 }
//                 else{
//                     swal({title: 'Shortlisted!',text: `${data}!`,icon: 'success'})
//                     like =  document.querySelector('.fa-thumbs-up')
//                     like.style.color = 'red'
//                     like.style.transform = 'rotate(15deg)';
//                 }
//             });
//         } else {
//             swal("Cancelled", "You dont send any like:)", "error");
//         }
//     });
//
// }
//
//

