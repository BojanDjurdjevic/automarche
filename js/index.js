document.write("Pozdrav iz JS")
console.log("pozdrav")

let imgDiv = document.querySelector(".galery")
let images = document.querySelectorAll(".galery img")
let bckDiv = document.querySelector(".bckDiv")
function togleBck() {
    console.log("radi")
    bckDiv.classList.add("visible")
}
imgDiv.addEventListener("click", togleBck)