let imgDiv = document.querySelector(".galery")
let images = document.querySelectorAll(".galery img")
images[0].classList.add("visible")
let numPics = images.length
let imgNum = 0
let bckDiv = document.querySelector(".bckDiv")
let xmark = document.querySelector("#xmark")
let left = document.querySelector("#left")
let right = document.querySelector("#right")
function zoomIn() {
    console.log(images)
    bckDiv.classList.add("visible")
    imgDiv.classList.add("zoom")
}
function zoomOut() {
    bckDiv.classList.remove("visible")
    imgDiv.classList.remove("zoom")
}
function displayNone() {
    images.forEach((img) => {
        img.style.display = "none"
    })
}
imgDiv.addEventListener("click", zoomIn)
xmark.addEventListener("click", zoomOut)
right.addEventListener("click", () => {
    displayNone()
    imgNum++
    if(imgNum == numPics) {
        imgNum = 0
    }
    images[imgNum].style.display = "block"
})
left.addEventListener("click", () => {
    displayNone()
    imgNum--
    if(imgNum == -1) {
        imgNum = numPics -1
    }
    images[imgNum].style.display = "block"
})