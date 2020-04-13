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
       if(div.style.background != '#fff'){
           div.style.order = '1'
       };
   }
   let presentNum = Math.ceil(count.length * 14 + 2 )
   let presentDiv =  document.querySelector('.present');
   presentDiv.innerHTML = presentNum + '% ' ;
   let r = 156 - (count.length*4);
   let g = 233 - (count.length *2);
   let b = 125 -  (count.length*6);
  let colorPresentDiv = "rgba("+ r +","+g +"," + b + ","+ (count.length+2)/10+")";
  console.log(colorPresentDiv)
   $(presentDiv).css("background",  colorPresentDiv )

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


