//variables

let heroImage = document.getElementById("heroImage");
const firstBar = document.querySelector('#first-bar');
const secondBar = document.querySelector('#second-bar');
const thirdBar = document.querySelector('#third-bar');
const description = document.querySelector('#description');
let images = [
    "url('../assets/img/undraw_awesome_rlvy-min.png')",
    "url('../assets/img/undraw_pending_approval_xuu9-min.png')",
    "url('../assets/img/undraw_Resume_folder_re_e0bi-min.png')"
]
let descriptions =[
    "Jako zalogowany użytkownik <br /> masz dostęp do większej palety funkcjonalności!",
    "Jako zalogowany użytkownik <br /> otrzymujesz dostęp do wysłania swojej aplikacji",
    "Jako zalogowany użytkownik <br /> możesz przeglądać otrzymane oferty zgłoszeń"
]
let i = 2;

//functions

function changeHero(image,descriptionText,removeAddBar,addBar1,addBar2,nameFunction) {
        nameFunction;
        heroImage.style.backgroundImage = image;
        description.innerHTML = descriptionText;
        removeAddBar.classList.remove('bg-light', 'noMainBtn');
        removeAddBar.classList.add('bg-primary','mainBtn');
        addBar1.classList.add('bg-light', 'noMainBtn');
        addBar2.classList.add('bg-light', 'noMainBtn');
}
function changeImage(){
    switch (i) {
        case 1:
            changeHero(images[0],descriptions[0],firstBar,secondBar,thirdBar,openAnimation());
            i++;
            break;
    
        case 2:
            changeHero(images[1],descriptions[1],secondBar,firstBar,thirdBar,openAnimation());
            i++;
            break;
        case 3:
            changeHero(images[2],descriptions[2],thirdBar,secondBar,firstBar,openAnimation());
            i = 1;      
    }

}
changeImage();
setInterval(changeImage,5000);

// onclick functiions

firstBar.addEventListener('click', ()=>{
    changeHero(images[0],descriptions[0],firstBar,secondBar,thirdBar);
    i=1;
});
secondBar.addEventListener('click', ()=>{
    changeHero(images[1],descriptions[1],secondBar,firstBar,thirdBar);
    i=2;
});
thirdBar.addEventListener('click', ()=>{
    changeHero(images[2],descriptions[2],thirdBar,secondBar,firstBar);
    i=3;
});

//animations

function openAnimation(){
const tl = anime.timeline({
    targets:heroImage,
    keyframes:[
        {translateX:-150, opacity:1, duration:500},
        {translateX:-250, opacity:0.7, delay:4000},
        {translateX:0, opacity:0, duration:1 }
    ],
    easing: 'linear',
    autoplay:'false'
    })
    tl.add({
        targets:"#description",
        keyframes:[
            {translateY:0, opacity:0,},
            {translateY:10, opacity:1},
            {translateY:0, delay:4400},
        ],
        duration:600,
        easing:'linear',
        direction:'alternate'
    })
}