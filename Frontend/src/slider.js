let heroImage = document.getElementById("heroImage");

const firstBar = document.querySelector('#first-bar');
const secondBar = document.querySelector('#second-bar');
const thirdBar = document.querySelector('#third-bar');
let i = 1;
function changeImage(){
    if(i == 1){
    heroImage.style.backgroundImage  = "url('../_design/assets/undraw/undraw_pending_approval_xuu9.svg')";
    firstBar.style.width = "5%";
    secondBar.style.width = "10%";
    thirdBar.style.width = "5%";
    secondBar.classList.add("bg-primary")
    i++;
    }else if (i == 2){
    heroImage.style.backgroundImage  = "url('../_design/assets/undraw/undraw_Resume_folder_re_e0bi.svg')";
    firstBar.style.width = "5%";
    secondBar.style.width = "5%";
    thirdBar.style.width = "10%";
    thirdBar.classList.add("bg-primary")
    i++;
    }else{
    heroImage.style.backgroundImage  = "url('../_design/assets/undraw/undraw_awesome_rlvy.svg')";
    firstBar.style.width = "10%";
    secondBar.style.width = "5%";
    thirdBar.style.width = "5%";
    firstBar.classList.add("bg-primary")
    i = 1;
    }
}

setInterval(changeImage,5000);