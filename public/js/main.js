window.onload = function init(){


        function present(PRESENT) {
            let count = []
            for (const [key, value] of Object.entries(PRESENT)) {
                count.push(key)
                console.log(count);
                let div = document.querySelector(`.${key}`);
                let color = $(div).data("color");
                $(div).css("background", color)
                div.style.transition = 'background 0.5s ease-in-out'
                // if(div.style.background != '#fff'){
                //     div.style.order = 1
                // };
            }
            let presentNum = Math.ceil(count.length * 14 + 2)
            let presentDiv = document.querySelector('.present');
            presentDiv.innerHTML = presentNum + '% ';
            let r = 156 - (count.length * 4);
            let g = 233 - (count.length * 2);
            let b = 125 - (count.length * 6);
            let colorPresentDiv = "rgba(" + r + "," + g + "," + b + "," + (count.length + 2) / 10 + ")";
            console.log(colorPresentDiv)
            $(presentDiv).css("background", colorPresentDiv)

            if (presentNum == 100) {
                swal({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Your profile has been completed... Now find Job!',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }

        present(PRESENT)

    }



function checkCategory(id){
    if (confirm("to view more please fill Your profile")) window.location = `profile/${id}`;
}
function resetProfile(id) {
    var form = this;
    swal({
        title: "Are you sure to reset Your profile?",
        text: "You will not be able to recover this details!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            let url = location.origin + '/profile/reset';
            axios({method:'delete',url: url,
                data:{
                    id:id,
                }}).then(({data})=>{
                swal({
                    title: 'Shortlisted!',
                    text: 'Profile successfully initialized!',
                    icon: 'success'
                }).then(({data})=>{
                 location.reload()
                });
            });
        } else {
            swal("Cancelled", "Your details is safe :)", "error");
        }
    });
}


// const sendMail = () => {
//     const formattedBody = `
//       First Name:
//       Last Name:

//       Email:
//       Phone:

//       Github repo: http://
//       Linkedin: http://

//       What is your experience (years):
//       When are you available:
//     `;
//     const mailToLink = `mailto:x@y.com?body=${encodeURIComponent(formattedBody)}`;
//     window.open(mailToLink);
//   };

  const readMore = (e,) => {
    if(e.textContent == 'View more'){
        e.textContent = 'X';
        e.classList = 'col-2';
        e.style.textAlign = 'center'
        e.style.backgroundColor = 'red';


    }else {
        e.textContent = 'View more'
        e.classList = 'col-5';
        e.style.backgroundColor = '#737ee5';
    }
    let parent = e.parentNode;
    let grendPa = parent.parentNode;
      grendPa.classList.toggle('card-active');
    document.querySelector('.Overlayer').classList.toggle('Overlayer-active');
     let none = document.querySelectorAll('.none');
     none.forEach(details =>{
        details.classList.toggle('block');
     })
  };

function addLikeTojob(rilation,beloved,love){
    var form = this;
    swal({
        title: "Are you sure you like this job?",
        text: "if you add like this is send to placement...",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am like this job!'
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
               }
            });
        } else {
            swal("Cancelled", "You dont send any like:)", "error");

        }
    });

}

