const getFirstImage = document.querySelector('#formFileDisabled1');
const firstImage = document.querySelector('#first-image');
const firstDeleteImage = document.querySelector('#first-delete-image');
const sectionFirstImage = document.querySelector('#sectionAddFirstImage');
function disabled1(){
    getFirstImage.disabled = true;
}
function enabled1(){
    getFirstImage.disabled = false;
}
function disabled2(){
    getSecondImage.disabled = true;
}
function enabled2(){
    getSecondImage.disabled = false;
}
function disabled3(){
    getThirdImage.disabled = true;
}
function enabled3(){
    getThirdImage.disabled = false;
}

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
        disabled2();
        setTimeout(enabled2,100)
    })

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
        disabled3();
        setTimeout(enabled3,100)
    })

const descriptionTextArea = document.querySelector('#descriptionTA');
const leftSigns = document.querySelector('#signs');
descriptionTextArea.addEventListener('input',()=>{
    leftSigns.innerHTML = 500-descriptionTextArea.value.length;
})
const categoryOptions = document.querySelector('#categorySelect');
const titleSelect = document.querySelector('#title');
categoryOptions.addEventListener('click',()=>{
    categoryOptions.size = 4;
})
let tab = []
function onlyUnique(value, index, self) {
  return self.indexOf(value) === index;
}
categoryOptions.addEventListener('change',(e)=>{

    tab.push(e.target.value);
    var uniqTab = tab.filter(onlyUnique)
    titleSelect.value = uniqTab;
    titleSelect.innerHTML = titleSelect.value.toString();
    console.log(e.target.value)
});