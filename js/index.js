let imgDiv = document.querySelector(".galery")
let images = document.querySelectorAll(".galery img")
let bckDiv = document.querySelector(".bckDiv")
let xmark = document.querySelector("#xmark")
function zoomIn() {
    console.log("radi")
    bckDiv.classList.add("visible")
    imgDiv.classList.add("zoom")
}
function zoomOut() {
    console.log("radi")
    bckDiv.classList.remove("visible")
    imgDiv.classList.remove("zoom")
}
imgDiv.addEventListener("click", zoomIn)
xmark.addEventListener("click", zoomOut)