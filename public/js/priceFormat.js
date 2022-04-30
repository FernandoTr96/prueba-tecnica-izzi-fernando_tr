const $inputs = document.querySelectorAll('input[data-mxn]');

const onlyNumbers = (e) => {

    let code = (e.which) ? e.which : e.keyCode;

    if(code >= 48 && code <= 57 || code === 46){
        return true;
    }
    else{
        return false;
    }

}

const changeFormat = ({target})=>{
    target.value = mxn.format(target.value);
}

const initFormat = ()=>{
    $inputs.forEach(el => {
        if(el.value.length !== 0){
            changeFormat({
                target: el
            });
        }
    });
}

document.addEventListener('DOMContentLoaded',initFormat());

$inputs.forEach(el => {
    el.onkeypress = onlyNumbers;
    el.onchange = changeFormat;
});
