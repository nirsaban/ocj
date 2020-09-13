
$(document).ready(function(){
$('.tabs').tabs();
$('#textarea1').val('New Text');
$('select').formSelect();
let url = location.origin + `/profileData/${id}`
axios.get(url).then(({data})=>{
console.log(data.profile)

});
});
class education{

}

function updateCategory(){
    let url = location.origin + '/profile/update';
     axios({method:'post',url: url,
         data:{
             item:'category_id',
             id:id,
             value:category.value
         }}).then(({data})=>{

     });
}

function saveAndAddMoreEducation(){
let schoolVal =         document.getElementById('school').value;
let diplomaVal =        document.getElementById('diploma').value;
let fieldStudyVal =     document.getElementById('fieldStudy').value;
let startEduVal =       document.getElementById('education__start').value;
let endEduVal =         document.getElementById('education__end').value;
let gradeVal =          document.getElementById('grade').value
if(schoolVal.length == 0)
{
errorSchool.innerText = 'school is required'
}
else if(diplomaVal.length == 0){
    errorDiploma.innerText = 'diploma is required'
}else if (fieldStudyVal.length == 0 ){
    errorField.innerText = 'field of study  is required'
}else if(startEduVal.length == 0){
    errorStart.innerText = 'you must choose start Year'
}else if(endEduVal.length == 0){
    errorEnd.innerText = 'you must choose end Year'
}
else if(parseInt(startEduVal) >  parseInt(endEduVal)){
    errorTime.innerText = 'no valid choose start and end Year'
}else if(gradeVal.length == 0){
    errorGrade.innerText = 'grade is require'
}
else{
    const edu  = []
    edu.push({
        school:schoolVal,
        diploma:diplomaVal,
        fieldStudy:fieldStudyVal,
        startEdu:startEduVal,
        endEdu:endEduVal,
        grade:gradeVal
    })
    if (localStorage.getItem("edu") === null) {
    localStorage.setItem('edu',JSON.stringify(edu))
    loader.style.display =  'inline-block'
    blinking.style.display = 'block'
    document.getElementById('school').value  = '';
    document.getElementById('diploma').value = '';
    document.getElementById('fieldStudy').value = '';
    document.getElementById('grade').value = '';
    $('#loader').delay(1700).fadeOut();
    $('#blinking').delay(1700).fadeOut();
    saveAndMore.style.display = 'inline-block'
 }else{
    let eduStorage =  localStorage.getItem('edu')
    let eduStorageArr = JSON.parse(eduStorage)
    eduStorageArr.push({
        school:schoolVal,
        diploma:diplomaVal,
        fieldStudy:fieldStudyVal,
        startEdu:startEduVal,
        endEdu:endEduVal,
        grade:gradeVal
    })
    localStorage.setItem('edu',JSON.stringify(eduStorageArr))
    console.log(localStorage.getItem('edu'))
    loader.style.display =  'inline-block'
    blinking.style.display = 'block'
    document.getElementById('school').value  = '';
    document.getElementById('diploma').value = '';
    document.getElementById('fieldStudy').value = '';
    document.getElementById('grade').value = '';
    education__end.options[education__end.selectedIndex].text  = 'year'
    $('#loader').delay(1700).fadeOut();
    $('#blinking').delay(1700).fadeOut();
    saveAndMore.style.display = 'inline-block'

 }

}

}
function saveAndUpdateEducation(id){
    if (localStorage.getItem("edu") === null) {
        let schoolVal =         document.getElementById('school').value;
        let diplomaVal =        document.getElementById('diploma').value;
        let fieldStudyVal =     document.getElementById('fieldStudy').value;
        let startEduVal =       document.getElementById('education__start').value;
        let endEduVal =         document.getElementById('education__end').value;
        let gradeVal =          document.getElementById('grade').value
        const edu  = []
         edu.push({
             school:schoolVal,
             diploma:diplomaVal,
             fieldStudy:fieldStudyVal,
             startEdu:startEduVal,
             endEdu:endEduVal,
             grade:gradeVal
         })
        localStorage.setItem('edu',JSON.stringify(edu))
        loader.style.display =  'inline-block'
        blinking.style.display = 'block'
        document.getElementById('school').value  = '';
        document.getElementById('diploma').value = '';
        document.getElementById('fieldStudy').value = '';
        document.getElementById('grade').value = '';
        $('#loader').delay(1700).fadeOut();
        $('#blinking').delay(1700).fadeOut();
        saveAndMore.style.display = 'inline-block'
     }else{
        let eduStorage =  localStorage.getItem('edu')
        let eduStorageArr = JSON.parse(eduStorage)
        eduStorageArr.push({
            school:schoolVal,
            diploma:diplomaVal,
            fieldStudy:fieldStudyVal,
            startEdu:startEduVal,
            endEdu:endEduVal,
            grade:gradeVal
        })
        localStorage.setItem('edu',JSON.stringify(eduStorageArr))
        console.log(localStorage.getItem('edu'))
        loader.style.display =  'inline-block'
        blinking.style.display = 'block'
        document.getElementById('school').value  = '';
        document.getElementById('diploma').value = '';
        document.getElementById('fieldStudy').value = '';
        document.getElementById('grade').value = '';
        education__end.options[education__end.selectedIndex].text  = 'year'
        $('#loader').delay(1700).fadeOut();
        $('#blinking').delay(1700).fadeOut();
        saveAndMore.style.display = 'inline-block'
    }
    let url = location.origin + '/profile/update';
    let educations = localStorage.getItem('edu')
     axios({method:'post',url: url,
         data:{
             item:'education',
             id:id,
             value:educations
         }}).then(({data})=>{
        //  location.reload();
     });
}
