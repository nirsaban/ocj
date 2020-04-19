window.onload = function init() {
    for (const [key, value] of Object.entries(localStorage)) {
        if(key === 'requirements'){
             document.getElementById('disabled').style.display = 'block';
              const inputsParent = document.getElementById('requirementsAll');
               const reqArr = JSON.parse(value);
               document.getElementById('reqIn').value = reqArr[0];
               for(let i = 1; i < reqArr.length; i++){
                   let input = document.createElement('input');
                   input.setAttribute('type', 'text');
                   input.classList = 'require';
                   input.value = reqArr[i];
                   inputsParent.appendChild(input)
               }
            reqArr.forEach(req => {
               let pr = document.getElementById(key);
                let li = document.createElement('li')
                li.textContent = req;
                pr.appendChild(li)
            })
        }else {
            document.getElementById(key).innerHTML = value;
            let form = document.forms[1];
            let newValue = value.replace(key + '-', "");
            if (key === 'description') {
                document.querySelector('.description ').innerText = newValue;
            } else if (key === 'mainTitle' || key === 'subTitle') {
                continue;
            }else {
                let selectElement = form.querySelector(`input[name=${key}]`);
                selectElement.value = newValue;
            }
        }
    }
    let selectBy = document.getElementById('courseRegister');
    selectBy.addEventListener('change', () => {
        localStorage.setItem('mainTitle',selectBy.options[selectBy.selectedIndex].text)
        mainTitle.innerHTML = selectBy.options[selectBy.selectedIndex].text;
        let url = location.origin + '/courseId'
        axios({
            method: 'post', url: url,
            data: {
                id: selectBy.value,
            }
        }).then(({data}) => {
            let selcetSub = document.getElementById('sub&main');
            selcetSub.innerHTML += data;
        });
    })
}

function addRequire(){
   document.getElementById('disabled').style.display ='block'
    let inputsParent = document.getElementById('requirementsAll');
    let input = document.createElement('input');
    input.setAttribute('type','text');
    input.classList = 'require';
    input.placeholder = 'add more require...'
    inputsParent.appendChild(input)

}
function saveAllRequire(){
    document.getElementById('disabledPlus').style.display = 'none';
    let inputsParent = document.getElementById('requirementsAll');
     const reqArr = []
     let allRequire = document.querySelectorAll('.require');
     allRequire.forEach(inputRequire =>{
         inputRequire.style.color = 'rgba(131, 125, 125, 0.24)';
         reqArr.push(inputRequire.value)
    })
    let inputHidden = document.createElement('input')
    inputHidden.setAttribute('type','hidden')
    inputHidden.setAttribute('name','requirements ')
    let jsonValue = JSON.stringify(reqArr);
    inputHidden.value = jsonValue
    inputsParent.appendChild(inputHidden)
    let requireDiv = document.getElementById('requirements');
    reqArr.forEach(req=>{
       if(req.length > 3) {
           requireDiv.innerHTML += '<li>' + req + '</li>';
       }
    })
    localStorage.setItem('requirements',jsonValue);

}
// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
        formatCurrency($(this));
    },
    blur: function() {
        formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    var input_val = input.val();
    if (input_val === "") { return; }
    var original_len = input_val.length;
    var caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);

        if (blur === "blur") {
            right_side += "00";
        }

        right_side = right_side.substring(0, 2);

        input_val = "₪" + left_side + "." + right_side;
    } else {

        input_val = formatNumber(input_val);
        input_val = "₪" + input_val;
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
function addCategory(){
    let category = document.getElementById('category');
    localStorage.setItem('subTitle',category.options[category.selectedIndex].text)
    subTitle.innerHTML = category.options[category.selectedIndex].text;
}
function addInput(data) {
let elm = document.getElementById(data.name)
    if(data.value.length > 3){
        localStorage.setItem(data.name,data.name+'-'+data.value)
        elm.innerHTML = localStorage.getItem(data.name);
    }


}
function resetForm(){
    location.reload()
    localStorage.clear()
}
