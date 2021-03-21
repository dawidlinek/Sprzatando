const autoBtn = document.querySelectorAll('#autoButton') ;
const zamiatanieBtn = document.querySelectorAll('#zamiatanieButton') ;
const wycieranieBtn = document.querySelectorAll('#wycieranieButton');
const oknaBtn = document.querySelectorAll('#oknaButton') ;

var categoryButtons = [
    autoBtn,
    zamiatanieBtn,
    wycieranieBtn,
    oknaBtn
];
function lala(){
    categoryButtons[0].addEventListener('click',()=>{
        console.log('po')
    })
};
for (let i = 0; i < categoryButtons.length; i++) {
    lala();
}