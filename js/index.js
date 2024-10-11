let imgDiv = document.querySelector(".galery")
let images = document.querySelectorAll(".galery img")
displayNone()
images[0].style.display = "block"
//images[0].classList.add("visible")
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
    if(bckDiv.classList.contains("visible")) {
       bckDiv.classList.remove("visible") 
    }
    if(imgDiv.classList.contains("zoom")) {
       imgDiv.classList.remove("zoom") 
    }  
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

//HEADER

let goDiv = document.querySelector(".small")
let manage = document.querySelector(".manage")

goDiv.addEventListener("click", () => {
    console.log("radi")
    console.log(manage.classList)
    if(manage.classList.contains("manIn")) {
        manage.classList.remove("manIn")
        manage.classList.add("manOut")
    } else if(manage.classList.contains("manOut")) {
        manage.classList.remove("manOut")
        manage.classList.add("manIn")
    } else {
        manage.classList.add("manIn")
    }
})