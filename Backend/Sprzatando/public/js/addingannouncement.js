const getFirstImage = document.querySelector("#formFileDisabled1");
const firstImage = document.querySelector("#first-image");
const firstDeleteImage = document.querySelector("#first-delete-image");
const sectionFirstImage = document.querySelector("#sectionAddFirstImage");

let czas1 = 0;
let czas2 = 0;
let czas3 = 0;

function disabled1() {
    getFirstImage.disabled = true;
}
function enabled1() {
    getFirstImage.disabled = false;
}
function disabled2() {
    getSecondImage.disabled = true;
}
function enabled2() {
    getSecondImage.disabled = false;
}
function disabled3() {
    getThirdImage.disabled = true;
}
function enabled3() {
    getThirdImage.disabled = false;
}

firstDeleteImage.addEventListener("click", () => {
    sectionFirstImage.style.display = "flex";
    firstImage.src = "";
    getFirstImage.value = null;
    firstImage.style.display = "none";
    firstDeleteImage.style.display = "none";
    disabled1();
    setTimeout(enabled1, 100);
});

getFirstImage.addEventListener("change", (evt) => {
    var tgt = evt.target,
        files = tgt.files;
    var fr = new FileReader();
    console.log(tgt);
    fr.onload = function () {
        firstImage.style.display = "flex";
        firstImage.src = fr.result;
        sectionFirstImage.style.display = "none";
        firstDeleteImage.style.display = "flex";
    };
    fr.readAsDataURL(files[0]);
});

const getSecondImage = document.querySelector("#formFileDisabled2");
const secondImage = document.querySelector("#second-image");
const secondDeleteImage = document.querySelector("#second-delete-image");
const sectionSecondImage = document.querySelector("#sectionAddSecondImage");

secondDeleteImage.addEventListener("click", () => {
    secondImage.src = "";
    sectionSecondImage.style.display = "flex";
    secondImage.style.display = "none";
    secondDeleteImage.style.display = "none";
    getSecondImage.value = null;
    disabled2();
    setTimeout(enabled2, 100);
});

getSecondImage.addEventListener("change", (evt) => {
    var tgt = evt.target,
        files = tgt.files;

    var fr = new FileReader();
    fr.onload = function () {
        secondImage.style.display = "flex";
        secondImage.src = fr.result;
        secondDeleteImage.style.display = "flex";
        sectionSecondImage.style.display = "none";
    };
    fr.readAsDataURL(files[0]);
});

const getThirdImage = document.querySelector("#formFileDisabled3");
const thirdImage = document.querySelector("#third-image");
const thirdDeleteImage = document.querySelector("#third-delete-image");
const sectionThirdImage = document.querySelector("#sectionAddThirdImage");

thirdDeleteImage.addEventListener("click", () => {
    thirdImage.src = "";
    sectionThirdImage.style.display = "flex";
    thirdImage.style.display = "none";
    thirdDeleteImage.style.display = "none";
    getThirdImage.value = null;
    disabled3();
    setTimeout(enabled3, 100);
});

getThirdImage.addEventListener("change", (evt) => {
   
    var tgt = evt.target,
        files = tgt.files;
    var fr = new FileReader();
    fr.onload = function () {
        thirdImage.style.display = "flex";
        thirdImage.src = fr.result;
        thirdDeleteImage.style.display = "flex";
        sectionThirdImage.style.display = "none";
        thirdDeleteImage.style.display = "flex";
    };
    fr.readAsDataURL(files[0]);
});

const descriptionTextArea = document.querySelector("#descriptionTA");
const leftSigns = document.querySelector("#signs");
descriptionTextArea.addEventListener("input", () => {
    leftSigns.innerHTML = 500 - descriptionTextArea.value.length;
});

// window.addEventListener("DOMContentLoaded", () => {
//     const sections = [sectionFirstImage, sectionSecondImage, sectionThirdImage];
//     const imagesServerSee = [getFirstImage, getSecondImage, getThirdImage];
//     const imagesUserSee = [firstImage, secondImage, thirdImage];
//     const functionsToShow = [enabled1, enabled2, enabled3];
//     const imagesDelete = [
//         firstDeleteImage,
//         secondDeleteImage,
//         thirdDeleteImage,
//     ];

//     for (let i = 0; i < imagesUserSee.length; ++i) {
//         if (
//             imagesServerSee[i].defaultValue !== "" &&
//             imagesServerSee[i].defaultValue !== "localhost:8000/uploads/" &&
//             imagesServerSee[i].defaultValue !== "https://sprzatnij.me//uploads/"
//         ) {
//             // No disable input
//             functionsToShow[i]();

//             // const newFile = File.createFromFileName(
//             //     imagesServerSee[i].defaultValue
//             // );
//             console.log(
//                 new File(["foo"], "foo.png", {
//                     src: imagesServerSee[i].defaultValue,
//                 })
//             );
//             imagesServerSee.files.push(
//                 new File(["foo"], "foo.png", {
//                     src: imagesServerSee[i].defaultValue,
//                 })
//             );
//             console.log(1);

//             // const files = imagesServerSee[i].files;
//             // files.push({
//             //     name: 'Scre1'
//             // });
//             // console.log(files);
//             // const fr = new FileReader();
//             // fr.onload = function () {
//             //     imagesUserSee[i].style.display = "flex";
//             //     imagesUserSee[i].src = fr.result;
//             //     sections[i].style.display = "none";
//             //     imagesDelete[i].style.display = "flex";
//             // };
//             // fr.readAsDataURL(files[0]);

//             // Change src
//             // // imagesUserSee[i].currentSrc = imagesServerSee[i].defaultValue;
//             // imagesUserSee[i].src = imagesServerSee[i].defaultValue;
//             // imagesUserSee[i].src = imagesServerSee[i].defaultValue;

//             // // // Show
//             // // imagesUserSee[i].style.display = "flex";
//             // sections[i].style.display = "none";
//             // imagesDelete[i].style.display = "flex";
//         }
//     }
// });

// Obsługa kategorii
const categoryOptions = document.querySelector("#categorySelect");
const selectedServerSee = document.querySelector("#categoryServerSee");
const selectedUserSee = categoryOptions.querySelector("option[value='-1']");

let selectedOptionsID = new Set();
let selectedOptionsNames = new Set();

window.addEventListener("DOMContentLoaded", () => {
    leftSigns.innerHTML = 500 - descriptionTextArea.value.length;
    const active = categoryOptions.querySelectorAll("option.selectedOption");
    datePickerId.min = new Date().toISOString().split("T")[0];
    datePickerId.max = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toISOString().split("T")[0];

    active.forEach((option) => {
        selectedOptionsID.add(option.value);
        selectedOptionsNames.add(option.textContent);
    });

    selectedServerSee.value = Array.from(selectedOptionsID).join(",");
    selectedUserSee.textContent = Array.from(selectedOptionsNames).join(", ");
});

categoryOptions.addEventListener("change", (e) => {
    e.stopPropagation();
    newClickOption(e.target);
    categoryOptions.value = -1;
});

function newClickOption(option) {
    // When selected and clicked -> unselect
    const liText = categoryOptions.querySelector(
        `option[value='${option.value}']`
    ).textContent;

    if (selectedOptionsID.has(option.value)) {
        selectedOptionsID.delete(option.value);
        selectedOptionsNames.delete(liText);
    } else {
        selectedOptionsID.add(option.value);
        selectedOptionsNames.add(liText);
    }

    categoryOptions
        .querySelector(`option[value='${option.value}']`)
        .classList.toggle("selectedOption");

    selectedServerSee.value = Array.from(selectedOptionsID).join(",");
    selectedUserSee.textContent = Array.from(selectedOptionsNames).join(", ");
}

// Google Maps Places Api
google.maps.event.addDomListener(window, "load", initialize);
function initialize() {
    var input = document.getElementById("LocalizationAutocomplete");
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener("place_changed", function () {
        var place = autocomplete.getPlace();
        longitude.value=place.geometry.location.lng()
        latitude.value=place.geometry.location.lat()
    });
}

