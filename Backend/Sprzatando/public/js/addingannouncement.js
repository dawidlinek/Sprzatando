const getFirstImage = document.querySelector('#formFileDisabled1');
const firstImage = document.querySelector('#first-image');
    getFirstImage.addEventListener('change',(evt)=>{
    var tgt = evt.target || window.event.srcElement,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        firstImage.src = fr.result;
    }
    fr.readAsDataURL(files[0]);
    });
const getSecondImage = document.querySelector('#formFileDisabled2');
const secondImage = document.querySelector('#second-image');
    getSecondImage.addEventListener('change',(evt)=>{
    var tgt = evt.target || window.event.srcElement,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        secondImage.src = fr.result;
    }
    fr.readAsDataURL(files[0]);
    });
const getThirdImage = document.querySelector('#formFileDisabled3');
const thirdImage = document.querySelector('#third-image');
    getThirdImage.addEventListener('change',(evt)=>{
    var tgt = evt.target || window.event.srcElement,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        thirdImage.src = fr.result;
    }
    fr.readAsDataURL(files[0]);
    });
const descriptionTextArea = document.querySelector('#descriptionTA');
const leftSigns = document.querySelector('#signs');
descriptionTextArea.addEventListener('input',()=>{
    leftSigns.innerHTML = 500-descriptionTextArea.value.length;
})