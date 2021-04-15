const profiles = document.getElementsByClassName("profile");
let names = document.querySelectorAll(".profile p");

const name = document.querySelector("#detailName");
const date = document.querySelector("#detailDate");
const description = document.querySelector("#detailDescription");
const numberOfOrder = document.querySelector("#detailNumberOfOrder");
const lastRating = document.querySelector("#detailLastRating");
const avgRating = document.querySelector("#detailAvgRating");

const detailOff = document.querySelector("#detailOffDiv");
const detailOn = document.querySelector("#detailOnDiv");

for (let i = 0; i < profiles.length; i++) {
  profiles[i].addEventListener("click", () => {
    detailOff.classList.add("d-none");
    detailOn.classList.remove("d-none");
    detailOn.classList.add("d-flex");
    name.innerHTML = names[i].innerHTML;
    date.innerHTML = "24.02.2021";
    description.innerHTML =
      "Moim zdaniem to nie ma tak, że dobrze albo że nie dobrze. Gdybym miał powiedzieć, co cenię w życiu najbardziej, powiedziałbym, że ludzi. Ekhm… Ludzi, którzy podali mi pomocną dłoń, kiedy sobie nie radziłem, kiedy byłem sam.";
    numberOfOrder.innerHTML = "24";
    lastRating.innerHTML = "*gwiazdki*";
    avgRating.innerHTML = "*gwiazdki*";
  });
}
