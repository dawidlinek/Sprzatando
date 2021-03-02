let heroImage = document.getElementById("heroImage");

const firstBar = document.querySelector('#first-bar');
const secondBar = document.querySelector('#second-bar');
const thirdBar = document.querySelector('#third-bar');

const description = document.querySelector('#description');
let i = 2;
function changeImage(){
    //first bar
    if(i==1){
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_awesome_rlvy-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> masz dostęp do większej palety funkcjonalności!";
    firstBar.classList.remove('bg-info', 'noMainBtn');
    firstBar.classList.add('bg-primary','mainBtn');
    secondBar.classList.add('bg-info', 'noMainBtn');
    thirdBar.classList.add('bg-info', 'noMainBtn');
    i++;
    }
    //second bar
    else if(i==2){
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_pending_approval_xuu9-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> otrzymujesz dostęp do wysłania swojej aplikacji";
    firstBar.classList.add('bg-info', 'noMainBtn');
    secondBar.classList.remove('bg-info', 'noMainBtn');
    secondBar.classList.add('bg-primary','mainBtn');
    thirdBar.classList.add('bg-info', 'noMainBtn');
    i++;
    }
    //third bar
    else if(i==3){  
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_Resume_folder_re_e0bi-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> możesz przeglądać otrzymane oferty zgłoszeń";
    firstBar.classList.add('bg-info', 'noMainBtn');
    secondBar.classList.add('bg-info', 'noMainBtn');
    thirdBar.classList.remove('bg-info', 'noMainBtn');
    thirdBar.classList.add('bg-primary','mainBtn');
    i =1;
    }
}
setInterval(changeImage,5000);

firstBar.addEventListener('click', ()=>{
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_awesome_rlvy-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> masz dostęp do większej palety funkcjonalności!";
    firstBar.classList.remove('bg-info', 'noMainBtn');
    firstBar.classList.add('bg-primary','mainBtn');
    secondBar.classList.add('bg-info', 'noMainBtn');
    thirdBar.classList.add('bg-info', 'noMainBtn');
    i = 1;
});
secondBar.addEventListener('click', ()=>{
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_pending_approval_xuu9-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> otrzymujesz dostęp do wysłania swojej aplikacji";
    firstBar.classList.add('bg-info', 'noMainBtn');
    secondBar.classList.remove('bg-info', 'noMainBtn');
    secondBar.classList.add('bg-primary','mainBtn');
    thirdBar.classList.add('bg-info', 'noMainBtn');
    i = 2;
});
thirdBar.addEventListener('click', ()=>{
    heroImage.style.backgroundImage  = "url('../assets/img/undraw_Resume_folder_re_e0bi-min.png')";
    description.innerHTML = "Jako zalogowany użytkownik <br /> możesz przeglądać otrzymane oferty zgłoszeń";
    firstBar.classList.add('bg-info', 'noMainBtn');
    secondBar.classList.add('bg-info', 'noMainBtn');
    thirdBar.classList.remove('bg-info', 'noMainBtn');
    thirdBar.classList.add('bg-primary','mainBtn');
    i = 3;
});