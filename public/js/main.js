window.onload = function init(){

    // const id = document.getElementById('idUser').value;
    //        axios({method:'get',url:`http://127.0.0.1:8000/profileOnLoad/${id}`}).then(({data})=>{
    //        document.getElementById('cat_name').innerText += data.cat_name
    //   });

}




function checkCategory(id){
    if (confirm("to view more please fill Your profile")) window.location = `profile/${id}`;
}
function test(link){
    console.log(link)
    window.open(`${link}`, '_blank');
}


