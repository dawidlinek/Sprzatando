const getFirstImage = document.querySelector('#formFileDisabled1');
const firstImage = document.querySelector('#first-image');
const firstDeleteImage = document.querySelector('#first-delete-image');
const sectionFirstImage = document.querySelector('#sectionAddFirstImage');
    firstDeleteImage.addEventListener('click',()=>{
        firstImage.src = "";
        sectionFirstImage.style.display = 'flex';
        firstDeleteImage.style.display = 'none';
        getFirstImage.value = null;
        firstImage.style.display = 'none';
    })
    getFirstImage.addEventListener('change',(evt)=>{
    var tgt = evt.target,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        firstImage.style.display = 'flex';
        firstImage.src = fr.result;
        sectionFirstImage.style.display = 'none';
        firstDeleteImage.style.display = 'flex';
    }
    fr.readAsDataURL(files[0]);
    });
const getSecondImage = document.querySelector('#formFileDisabled2');
const secondImage = document.querySelector('#second-image');
const secondDeleteImage = document.querySelector('#second-delete-image');
const sectionSecondImage = document.querySelector('#sectionAddSecondImage');
    secondDeleteImage.addEventListener('click',()=>{
        secondImage.src = "";
        sectionSecondImage.style.display = 'flex';
        secondImage.style.display = 'none';
        secondDeleteImage.style.display = 'none';
        getSecondImage.value = null;
    })
    getSecondImage.addEventListener('change',(evt)=>{
    var tgt = evt.target,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        secondImage.style.display = 'flex';
        secondImage.src = fr.result;
        secondDeleteImage.style.display = 'flex';
        sectionSecondImage.style.display = 'none';
    }
    fr.readAsDataURL(files[0]);
    });
const getThirdImage = document.querySelector('#formFileDisabled3');
const thirdImage = document.querySelector('#third-image');
const thirdDeleteImage = document.querySelector('#third-delete-image');
const sectionThirdImage = document.querySelector('#sectionAddThirdImage');
    thirdDeleteImage.addEventListener('click',()=>{
        thirdImage.src = "";
        sectionThirdImage.style.display = 'flex';
        thirdImage.style.display = 'none';
        thirdDeleteImage.style.display = 'none';
        getThirdImage.value = null;
    })
    getThirdImage.addEventListener('change',(evt)=>{
    var tgt = evt.target,
    files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        thirdImage.style.display = 'flex';
        thirdImage.src = fr.result;
        thirdDeleteImage.style.display = 'flex';
        sectionThirdImage.style.display = 'none';
        thirdDeleteImage.style.display = 'flex';
    }
    fr.readAsDataURL(files[0]);
    });
const descriptionTextArea = document.querySelector('#descriptionTA');
const leftSigns = document.querySelector('#signs');
descriptionTextArea.addEventListener('input',()=>{
    leftSigns.innerHTML = 500-descriptionTextArea.value.length;
})