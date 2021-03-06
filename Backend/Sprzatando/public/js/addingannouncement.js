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


// Google Maps Places Api
google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {
    var input = document.getElementById('LocalizationAutocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
     //    $('#latitude').val(place.geometry['location'].lat());
     //    $('#longitude').val(place.geometry['location'].lng());
     //    $("#lat_area").removeClass("d-none");
     //    $("#long_area").removeClass("d-none");
    });
}