//variables

let heroImage = document.getElementById("heroImage");
const firstBar = document.querySelector('#first-bar');
const secondBar = document.querySelector('#second-bar');
const thirdBar = document.querySelector('#third-bar');
const description = document.querySelector('#description');
let images = [
    "url('/img/login/sliderkoksobrazek1.png')",
    "url('/img/login/sliderkoksobrazek2.png')",
    "url('/img/login/sliderkoksobrazek3.png')"
]
let descriptions = [
    "Jako zalogowany użytkownik <br /> masz dostęp do większej palety funkcjonalności!",
    "Jako zalogowany użytkownik <br /> otrzymujesz dostęp do wysłania swojej aplikacji",
    "Jako zalogowany użytkownik <br /> możesz przeglądać otrzymane oferty zgłoszeń"
]
let i = 2;

//functions

function changeHero(image, descriptionText, removeAddBar, addBar1, addBar2, nameFunction) {
    nameFunction;
    heroImage.style.backgroundImage = image;
    description.innerHTML = descriptionText;
    removeAddBar.classList.remove('bg-light', 'noMainBtn');
    removeAddBar.classList.add('bg-primary', 'mainBtn');
    addBar1.classList.add('bg-light', 'noMainBtn');
    addBar2.classList.add('bg-light', 'noMainBtn');
}
function changeImage() {
    switch (i) {
        case 1:
            changeHero(images[0], descriptions[0], firstBar, secondBar, thirdBar, openAnimation());
            i++;
            break;

        case 2:
            changeHero(images[1], descriptions[1], secondBar, firstBar, thirdBar, openAnimation());
            i++;
            break;
        case 3:
            changeHero(images[2], descriptions[2], thirdBar, secondBar, firstBar, openAnimation());
            i = 1;
    }
}
function clickChangeImage() {
    switch (i) {
        case 4:
            changeHero(images[0], descriptions[0], firstBar, secondBar, thirdBar, clickOpenAnimation());
            i = 2;
            break;
        case 5:
            changeHero(images[1], descriptions[1], secondBar, firstBar, thirdBar, clickOpenAnimation());
            i = 3;
            break;
        case 6:
            changeHero(images[2], descriptions[2], thirdBar, secondBar, firstBar, clickOpenAnimation());
            i = 1;
    }
}
changeImage();
setInterval(changeImage, 5000);

// onclick functiions

firstBar.addEventListener('click', () => {
    i = 4;
    changeHero(images[0], descriptions[0], firstBar, secondBar, thirdBar, clickChangeImage());
});
secondBar.addEventListener('click', () => {
    i = 5;
    changeHero(images[1], descriptions[1], secondBar, firstBar, thirdBar, clickChangeImage());
});
thirdBar.addEventListener('click', () => {
    i = 6;
    changeHero(images[2], descriptions[2], thirdBar, secondBar, firstBar, clickChangeImage());
});

//animations

function openAnimation() {
    const tl = anime.timeline({
        targets: heroImage,
        keyframes: [
            { translateX: 0, opacity: 0, duration: 1 },
            { translateX: -50, opacity: 1, duration: 500 },
            { translateX: -250, opacity: 0.7, delay: 4000 },
            { translateX: 0, opacity: 0, duration: 1 }
        ],
        easing: 'linear',
        autoplay: 'false'
    })
    tl.add({
        targets: "#description",
        keyframes: [
            { translateY: 0, opacity: 0, },
            { translateY: 10, opacity: 1 },
            { translateY: 0, delay: 4400 },
        ],
        duration: 600,
        easing: 'linear',
        direction: 'alternate'
    })
}
function clickOpenAnimation() {
    const tl2 = anime.timeline({
        targets: heroImage,
        keyframes: [
            { translateX: 0, opacity: 0, duration: 1 },
            { translateX: -50, opacity: 1, duration: 500 },
            { translateX: -250, opacity: 0.7, delay: 4000 },
            { translateX: 0, opacity: 0, duration: 1 }
        ],
        easing: 'linear',
        autoplay: 'false'
    })
    tl2.add({
        targets: "#description",
        keyframes: [
            { translateY: 0, opacity: 0, },
            { translateY: 10, opacity: 1 },
            { translateY: 0, delay: 4400 },
        ],
        duration: 600,
        easing: 'linear',
        direction: 'alternate'
    })
}