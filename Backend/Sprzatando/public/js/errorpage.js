const firstNumber = document.querySelector('#firstNum');
const secondNumber = document.querySelector('#secondNum');
const thirdNumber = document.querySelector('#thirdNum');
const tmp=[firstNumber.innerHTML,secondNumber.innerHTML,thirdNumber.innerHTML]
let i = 0;
function randomNumber(){
    if(i > 5){
        firstNumber.innerHTML = tmp[0];
        secondNumber.innerHTML =tmp[1];
        thirdNumber.innerHTML =tmp[2];
    }else{
    firstNumber.innerHTML = Math.floor(Math.random() * 9);
    secondNumber.innerHTML = Math.floor(Math.random() * 9);
    thirdNumber.innerHTML = Math.floor(Math.random() * 9);
    i++
    }
}
setInterval(randomNumber,80);