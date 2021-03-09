const firstNumber = document.querySelector('#firstNum');
const secondNumber = document.querySelector('#secondNum');
const thirdNumber = document.querySelector('#thirdNum');
let i = 0;
function randomNumber(){
    if(i > 5){
        firstNumber.innerHTML = "4";
        secondNumber.innerHTML ="0"
        thirdNumber.innerHTML ="4";
    }else{
    firstNumber.innerHTML = Math.floor(Math.random() * 9);
    secondNumber.innerHTML = Math.floor(Math.random() * 9);
    thirdNumber.innerHTML = Math.floor(Math.random() * 9);
    i++
    }
}
setInterval(randomNumber,100);