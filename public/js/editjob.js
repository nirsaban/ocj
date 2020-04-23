function addRequire(){
    document.getElementById('disabled').style.display ='block'
    let inputsParent = document.getElementById('requirementsAll');
    let input = document.createElement('input');
    input.setAttribute('type','text');
    input.classList = 'require';
    input.placeholder = 'add more require...'
    inputsParent.appendChild(input)

}

function saveAllRequire(button){
    disabledPlus.style.display = 'none'
    button.style.cursor ='not-allowed'
    button.style.opacity = '0.6';
    const reqArr = []
    let allRequire = document.querySelectorAll('.require');
    allRequire.forEach(inputRequire =>{
        inputRequire.style.color = 'rgba(131, 125, 125, 0.24)';
        inputRequire.disabled = true
        reqArr.push(inputRequire.value)
    })
    let jsonValue = JSON.stringify(reqArr);
    trickReq.value = jsonValue

}
