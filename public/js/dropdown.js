let dropdownRef = null;

document.addEventListener('click',({target})=>{
    if(target.matches('#dropdownButton')){
        target.nextElementSibling.classList.toggle('hidden');
        dropdownRef = target;
    }
    else{
        dropdownRef !== null && dropdownRef.nextElementSibling.classList.add('hidden');
    }
})