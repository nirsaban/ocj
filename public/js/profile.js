//class that update data
class Profile{

    editDom(data){
        if(data['col'] == 'category_id'){
            let select = document.querySelector('.cat');
            select.style.display = 'block';
        }else if(data['col'] == 'about_me'){
            $(editAbout).prop("onclick", null).off("click");
            let parentAbout = document.getElementById('aboutParent')
            let pAbout = document.querySelector('.aboutMe');
            let ValpAbout = pAbout.textContent;
            pAbout.style.display='none';
            let inputAbout = document.createElement('TEXTAREA');
            inputAbout.setAttribute('type','text');
            inputAbout.setAttribute('id','inputAbout');
            inputAbout.value = ValpAbout;
            console.log(pAbout)
            parentAbout.appendChild(inputAbout)
            inputAbout.addEventListener('focusout',()=>{
                let up = document.querySelector('.updateAbout');
                up.id = 'rotate-scale-up-diag-1'
            })

        }else if(data['col'] == 'education'){
            $(editEd).prop("onclick", null).off("click");
            editEd.removeAttribute('onclick');
            const parentEducation = document.querySelector('.educationParent')
            let plusEdu = document.createElement('button');
            let plusAllEdu = document.createElement('button')
            plusEdu.innerText = '+ '
            plusEdu.classList = ' plusEdu col-sm-1';
            plusAllEdu.innerText = 'V'
            plusAllEdu.classList = ' plusEduAll col-xs-1'
            parentEducation.appendChild(plusEdu)
            parentEducation.appendChild(plusAllEdu)
            let allEdu = document.querySelectorAll('.pEdu')
            pEdu.style.display = 'none';
            allEdu.forEach(edu =>{
                let inputEdu = document.createElement('input');
                inputEdu.setAttribute('type','text')
                inputEdu.classList = 'eduInput form-control col-4';
                inputEdu.setAttribute('value',edu.textContent)
                parentEducation.appendChild(inputEdu)
            })
            plusEdu.addEventListener('click',()=>{
                let inputEducation = document.createElement('input');
                inputEducation.setAttribute('type','text');
                inputEducation.classList = 'eduInput form-control col-4'
                parentEducation.appendChild(inputEducation)
            })
            const arrEd = []
            plusAllEdu.addEventListener('click',()=>{
                document.querySelectorAll('.eduInput').forEach(edu =>{
                    arrEd.push(edu.value)
                });

                let jsonValue = JSON.stringify(arrEd);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type','hidden');
                inputHidden.classList = 'inputEdHidden';
                inputHidden.value = jsonValue;
                parentEducation.appendChild(inputHidden)
                plusEdu.disabled = true;
                let up = document.querySelector('.updateEd');
                up.id = 'rotate-scale-up-diag-1'
            })

        }else if(data['col'] == 'my_skills'){
            editSk.removeAttribute('onclick');
            const parentSkills = document.querySelector('.skillsParent');
            let plusSkill = document.createElement("button");
            plusSkill.innerHTML += '+';
            let plusSkillAll = document.createElement("button");
            plusSkillAll.innerHTML += 'V';
            parentSkills.appendChild(plusSkill);
            parentSkills.appendChild(plusSkillAll);
            plusSkill.addEventListener('click',()=>{
                let inputSkills = document.createElement('input');
                inputSkills.setAttribute('type','text');
                inputSkills.classList = 'skillsInput form-control col-md-2'
                parentSkills.appendChild(inputSkills);
            })
            let allSkills = document.querySelectorAll('.tags')
            spansSkills.style.display = 'none';
            allSkills.forEach(skill =>{
                let inputSkill = document.createElement('input');
                inputSkill.setAttribute('type','text')
                inputSkill.classList = 'skillsInput form-control col-md-2';
                inputSkill.setAttribute('value',skill.textContent)
                parentSkills.appendChild(inputSkill)
            })
            const arrSk = []
            plusSkillAll.addEventListener('click',()=>{
                plusSkill.disabled = true;
                plusSkillAll.disabled = true;
                let allInputSkills = document.querySelectorAll('.skillsInput');
                allInputSkills.forEach(inputSkill=>{
                   arrSk.push(inputSkill.value)
                })
               let jsonValue = JSON.stringify(arrSk);
               let inputHidden = document.createElement('input');
               inputHidden.setAttribute('type','hidden');
               inputHidden.classList = 'inputSkHidden';
               inputHidden.value = jsonValue;
               parentSkills.appendChild(inputHidden)
               let up = document.querySelector('.updateSk');
               up.id = 'rotate-scale-up-diag-1'
            })
        }else if(data['col'] == 'links'){
            pLink.style.display = 'none';
            $(editLi).prop("onclick", null).off("click");
            const parentLinks = document.querySelector('.linksParent')
            let plusLinks = document.createElement('button');
            let plusAllLinks = document.createElement('button')
            plusLinks.innerText = '+ '
            plusLinks.classList = 'col-sm-1'
            plusAllLinks.innerText = 'V'
            plusAllLinks.classList = 'col-xs-1'
            parentLinks.appendChild(plusLinks)
            parentLinks.appendChild(plusAllLinks)
            let allLinks = document.querySelectorAll('.linksA')
            allLinks.forEach(link =>{
                let inputlink = document.createElement('input');
                inputlink.setAttribute('type','text')
                inputlink.classList = 'linkInput form-control col-md-5';
                inputlink.setAttribute('value',link.textContent)
                parentLinks.appendChild(inputlink)
            })
            plusLinks.addEventListener('click',()=>{
                let inputLinks = document.createElement('input');
                inputLinks.setAttribute('type','text');
                inputLinks.classList = 'linkInput form-control col-md-5'
                parentLinks.appendChild(inputLinks)
            })
            const arrLi = []
            plusAllLinks.addEventListener('click',()=>{
                document.querySelectorAll('.linkInput').forEach(link =>{
                    arrLi.push(link.value)
                });

                let jsonValue = JSON.stringify(arrLi);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type','hidden');
                inputHidden.classList = 'inputLiHidden';
                inputHidden.value = jsonValue;
                parentLinks.appendChild(inputHidden)
                plusLinks.disabled = true;
                let up = document.querySelector('.updateLi');
                up.id = 'rotate-scale-up-diag-1'
            })
        }
    }
    takeValue(data){
        const id = parseInt(data['id'])
        const item = data['col']
        if(data['col'] == 'category_id'){
            let valueF = document.querySelector('.cat').value;
            let value = parseInt(valueF)
            this.update(id,item,value)
        }else if(data['col'] == 'about_me'){
            let value = document.querySelector('#inputAbout').value;
            this.update(id,item,value)
        }else if(data['col'] == 'education'){
            let value = document.querySelector('.inputEdHidden').value;
            this.update(id,item,value)
        }else if(data['col'] == 'my_skills'){
            let value = document.querySelector('.inputSkHidden').value;
            this.update(id,item,value)
        }else if(data['col'] == 'links'){
            let value = document.querySelector('.inputLiHidden').value;
            this.update(id,item,value)
        }
    }

    update(id,item,value){
        axios({method:'post',url:`http://127.0.0.1:8000/profile/update`,
            data:{
                item:item,
                id:id,
                value:value
            }}).then(({data})=>{
       location.reload()
        });
    }
    color(item){
        let itemCom = document.querySelector(`.${item}comp`);
        itemCom.style.color ='red';
    }
}
//the global object from class
const profile = new Profile;
function edit(data){
    profile.editDom(data);
}
function update(data){
    profile.takeValue(data);
}
$("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
});

var options = {
    complete: function(response)
    {
        if($.isEmptyObject(response.responseJSON.error)){
            $("input[name='name']").val('');
            alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
};
function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
