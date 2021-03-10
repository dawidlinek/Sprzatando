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

// Obsługa kategorii
const categoryOptions = document.querySelector("#categorySelect");
const selectedServerSee = document.querySelector("#categoryServerSee");
const selectedUserSee = categoryOptions.querySelector("option[value='-1']");

let selectedOptionsID = new Set();
let selectedOptionsNames = new Set();

window.addEventListener("DOMContentLoaded", () => {
    const active = categoryOptions.querySelectorAll("option.selectedOption");

    active.forEach((option) => {
        selectedOptionsID.add(option.value);
        selectedOptionsNames.add(option.textContent);
    });

    selectedServerSee.value = Array.from(selectedOptionsID).join(",");
    selectedUserSee.textContent = Array.from(selectedOptionsNames).join(", ");
});

categoryOptions.addEventListener("change", (e) => {
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
    });
}
