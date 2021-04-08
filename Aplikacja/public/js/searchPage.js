// Map api
google.maps.event.addDomListener(window, "load", initialize);

function initialize() {
    var input = document.getElementById("lokalizacja-input");
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener("place_changed", function () {
        var place = autocomplete.getPlace();
        longitude.value = place.geometry.location.lng();
        latitude.value = place.geometry.location.lat();
    });
}
// End Map api

let i = 1;
let rangeVal = document.querySelector("#rangeValue");
let rangeTxt = document.querySelector("#rangeText");
rangeVal.addEventListener("input", () => {
    rangeTxt.innerHTML = rangeVal.value + "km";
});

function buttonStatus(evt) {
    startCountingToSearch();

    if (evt.classList.contains("button-off")) {
        evt.classList.remove("button-off");
        evt.classList.add("button-on");
        evt.style.color = "white";
    } else if (evt.classList.contains("button-on")) {
        evt.classList.remove("button-on");
        evt.classList.add("button-off");
        evt.style.color = "black";
    }
}

function scrollToTop() {
    window.scrollTo(0, 0);
    document.querySelector("#toTopButton").style.display = "none";
}
document.body.addEventListener("wheel", () => {
    showScroll();
});
window.addEventListener("scroll", () => {
    showScroll();
    checkCanLoadMoreOffers();
});

function showScroll() {
    if (window.scrollY > window.screen.height / 3) {
        document.querySelector("#toTopButton").style.display = "flex";
    } else {
        document.querySelector("#toTopButton").style.display = "none";
    }
}
showScroll();

const API_URL = "/api/announcement?";
const zgloszeniaPlace = document.getElementById("zgloszeniaPlace");
const inputsOpoznione = document.querySelectorAll(".search-announcement");
const priceMinInput = document.getElementById("price_min");
const priceMaxInput = document.getElementById("price_max");
const rangeInput = document.getElementById("rangeValue");
const titleInput = document.getElementById("search");
const longitudeInput = document.getElementById("longitude");
const latitudeInput = document.getElementById("latitude");
let zgloszenieCard;
let allZgloszenia;
let delayRequest;
let loadingData;
let page;

const getAnnouncementCard = ({
    id,
    img,
    title,
    desc,
    price,
    categories,
    localization,
}) => {
    const cloneCard = zgloszenieCard.cloneNode(true);
    const imgSrc =
        img !== null
            ? `url('/uploads/${img}')`
            : "url('/uploads/placeholder.jpg')";

    try {
        cloneCard.querySelector("h5.card-main-title").innerText = title;
        cloneCard.querySelector("p.card-main-desc").innerText = desc;

        // Image
        cloneCard.querySelector(
            "div.card-main-img-1"
        ).style.backgroundImage = imgSrc;

        // Localization
        cloneCard.querySelector(
            "small.card-main-localization"
        ).innerText = localization;

        // Category
        const categoryPlace = cloneCard.querySelector("div.card-main-category");
        const categoryOne = categoryPlace
            .querySelector("span.badge")
            .cloneNode(true);
        categoryOne.classList.add("mr-1");
        categoryPlace.innerHTML = "";

        categories.forEach((category) => {
            const categoryToAppend = categoryOne.cloneNode(true);
            categoryToAppend.innerText = category.name;
            categoryPlace.appendChild(categoryToAppend);
        });

        // Price
        cloneCard.querySelectorAll("h5.card-main-price").forEach((h5price) => {
            h5price.innerText = `${price}zł`;
        });

        cloneCard
            .querySelector("a.card-main-a-show")
            .setAttribute("href", `/singleOffer/${id}`);
    } catch (e) {
        console.error(e);
    }

    return cloneCard;
};

const getZgloszenia = async () => {
    clearInterval(delayRequest);
    loadingData = true;

    // Filter on category expect array of strings!
    const categoriesButtonsOn = document
        .querySelector("#categories")
        .querySelectorAll(".button-on");
    const categories = [];
    categoriesButtonsOn.forEach((button) => categories.push(button.value));

    const userFilters = {
        page,
        title: titleInput.value,
        price_min: priceMinInput.value,
        price_max: priceMaxInput.value,
        longitude: longitudeInput.value,
        latitude: latitudeInput.value,
        range: rangeInput.value,
        categories,
    };

    // Only on page 0, becouse later on infity scrolling we only add cards
    if (page === 0) {
        zgloszeniaPlace.innerText = "Przetwarzanie..";
    }

    const zgloszenia = await fetch(API_URL + new URLSearchParams(userFilters))
        .then((response) => response.json())
        .catch((error) => console.error(error))
        .finally(() => (loadingData = false));

    allZgloszenia = zgloszenia.all;

    // Only on page 0, becouse later on infity scrolling we only add cards
    if (page === 0) {
        if (zgloszenia.announcements.length === 0 && page === 0) {
            zgloszeniaPlace.innerText =
                "Brak rezultatów.. Spróbuj zastosować inne filtry!";
        } else {
            // Reset first card margin
            zgloszeniaPlace.innerHTML =
                "<div style='margin-top: -1rem;'></div>";
        }
    }

    if (zgloszenia.announcements.length > 0) {
        zgloszenia.announcements.forEach((zgloszenie) => {
            if (zgloszenie !== undefined) {
                zgloszeniaPlace.appendChild(
                    getAnnouncementCard({
                        id: zgloszenie.id,
                        img: zgloszenie.img1,
                        title: zgloszenie.title,
                        desc: zgloszenie.description,
                        price: zgloszenie.price,
                        localization: zgloszenie.localization,
                        categories: zgloszenie.categories,
                    })
                );
            }
        });
    }
};

const startCountingToSearch = () => {
    clearInterval(delayRequest);
    page = 0;

    delayRequest = setInterval(getZgloszenia, 1000);
};

const checkCanLoadMoreOffers = () => {
    if (loadingData) return;
    if (allZgloszenia < 10) return;
    if (page * 10 > allZgloszenia - 10) return;

    const zgloszeniaCards = zgloszeniaPlace.querySelectorAll(".card");
    const penultimateCard = zgloszeniaCards[zgloszeniaCards.length - 1];
    if (penultimateCard.getBoundingClientRect().top - window.innerHeight > 300)
        return;
    loadingData = true;
    page += 1;
    getZgloszenia();
};

// Init
(function () {
    page = 0;
    allZgloszenia = 0;

    // Get card component
    zgloszenieCard = zgloszeniaPlace.querySelector(".card");
    zgloszeniaPlace.innerHTML = "";
    zgloszeniaPlace.classList.remove("d-none");

    // Init call
    getZgloszenia();

    // Actions
    document.getElementById("mainSearch").addEventListener("click", () => {
        page = 0;
        getZgloszenia();
    });
    inputsOpoznione.forEach((input) => {
        input.addEventListener("change", startCountingToSearch);
        input.addEventListener("keydown", startCountingToSearch);
    });
})();
