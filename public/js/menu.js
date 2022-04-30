const $menuBtn = document.getElementById('menuBtn');
const $mobileMenu = document.getElementById('mobile-menu');

document.addEventListener('click',({target})=>{
    if(target.matches('#menuBtn') || target.matches('#menuBtn *')){
        $menuBtn.querySelector('.fa-bars').classList.toggle('hidden');
        $menuBtn.querySelector('.fa-xmark').classList.toggle('hidden');
        $mobileMenu.classList.toggle('scale-0');
    }
})