window.onload = function init(){

    function present(PRESENT) {
        console.log( PRESENT)
        let count = []
   for (const [key, value] of Object.entries(PRESENT)) {
       count.push(key)
       console.log(count);
       let div = document.querySelector(`.${key}`);
       let color = $(div).data("color");
       $(div).css("background", color)
       div.style.transition = 'background 0.5s ease-in-out'
   }
   let pre =  document.querySelector('.present').innerHTML = count.length* 14 + '% ' ;
     pre.style.fontSize = " 2rem"
}

    present(PRESENT)
}




function checkCategory(id){
    if (confirm("to view more please fill Your profile")) window.location = `profile/${id}`;
}
function test(link){
    console.log(link)
    window.open(`${link}`, '_blank');
}


