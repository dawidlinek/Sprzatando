const profiles = document.getElementsByClassName("profile");
let names = document.querySelectorAll(".profile p");

const name = document.querySelector("#detailName");
const date = document.querySelector("#detailDate");
const description = document.querySelector("#detailDescription");
const numberOfOrder = document.querySelector("#detailNumberOfOrder");
const lastRating = document.querySelector("#detailLastRating");
const avgRating = document.querySelector("#detailAvgRating");
const idUser = document.querySelector("#detailID");

const detailOff = document.querySelector("#detailOffDiv");
const detailOn = document.querySelector("#detailOnDiv");

for (let i = 0; i < profiles.length; i++) {
  profiles[i].addEventListener("click", () => {
    detailOff.classList.add("d-none");
    detailOn.classList.remove("d-none");
    detailOn.classList.add("d-flex");
    let user=names[i].dataset.user;
    fetch(`/api/user/${user}`).then(resp=>{
      resp.json().then(data=>{

        name.innerHTML = data.name;
        date.innerHTML = new Date(Date.parse(data.created_at)).toLocaleDateString();
        if(data.last){
          description.innerHTML =
         `<h4> Nazwa: ${data.last.title}</h4> ${data.last.rating_description??' Brak ostatniej oceny użytkownika'}`;
          lastRating.innerHTML = data.last.rating??'Brak'
          for(let i=0;i<Math.round(data.last.rating??0);i++)
          lastRating.innerHTM+="⭐";
        }else{
          description.innerHTML="Ten użytkownik jeszcze nie zrealizował żadnych zleceń"
          lastRating.innerHTML = "Brak";
        }
        numberOfOrder.innerHTML = data.jobs;
        idUser.innerText = data.id;
        avgRating.innerHTML = data.avg;
        for(let i=0;i<Math.round(data.avg??0);i++)
        lastRating.innerHTM+="⭐";
      })

    });
    
  });
}
function discard(id){
  fetch(`discard/${id}`)
  document.querySelector(`div[data-user="${id}"]`).remove()
  detailOn.classList.add("d-none");
  detailOff.classList.remove("d-none");
  detailOff.classList.add("d-flex");
}
let all_profiles=[]
document.addEventListener('DOMContentLoaded',()=>{
  all_profiles= document.querySelectorAll(".profile");
  all_names= document.querySelectorAll(".profile p");

})
document.querySelector('#search-user').addEventListener('input',e=>{

  let sorted=[];
  for (let i = 0; i < all_profiles.length; i++) {
    if(all_names[i].dataset.user==e.target.value || e.target.value=="" || e.target.value==null || names[i].innerHTML.toLowerCase().includes(e.target.value.toLowerCase())){
      sorted.push(all_profiles[i])
    }
    try {
      document.querySelector(`div[data-user="${all_names[i].dataset.user}"]`).remove()
    } catch (error) {}
  };
    sorted.forEach(e2=>{
  principals.appendChild(e2);
})
});