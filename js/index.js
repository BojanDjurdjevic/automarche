//SEARCH

let search = document.querySelector("#find")
let searchDiv = document.querySelector(".searchForm")
let searchBtn = document.querySelector(".searchForm form button")

search.addEventListener("click", () => {
    console.log("searchListen")
    if(!searchDiv.classList.contains("show")) {
        if(searchDiv.classList.contains("hide")) {
            searchDiv.classList.remove("hide")
        }
        searchDiv.classList.add("show")
    } else {
        searchDiv.classList.remove("show")
        searchDiv.classList.add("hide")
    }
})

searchBtn.addEventListener("click", () => {
    console.log("btnListen")
    searchDiv.classList.remove("show")
    searchDiv.classList.add("hide")
})

//HEADER

let goDiv = document.querySelector(".small")
let manage = document.querySelector(".manage")

if(goDiv != null && goDiv != undefined) {
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
}
// EDIT USER Profile
let editBtn = document.querySelector(".editBtn")
let editForm = document.querySelector(".edit_form")
let noEdit = document.querySelector(".edit_form i")
let subBtn = document.querySelector(".edit_form button")
let cslBtn = document.querySelector(".clsBtn")

let avatarDiv = document.querySelector(".avatarDiv")
let avatarPop = document.querySelector(".avatarPopup")
let noAvatarBtn = document.querySelector(".avatarPopup i")
let addAvatarBtn = document.querySelector("#chgAvatar")
let errMsgDiv = document.querySelector(".err_div")
let errMsgBtn = document.querySelector(".errmsg_btn") 

if(editBtn) {
    editBtn.addEventListener("click", () => {
    editBtn.style.display = 'none'
    cslBtn.style.display = 'none'
    editForm.style.display = 'flex'
})
}
if(noEdit) {
    noEdit.addEventListener("click", () => {
    editBtn.style.display = 'flex'
    cslBtn.style.display = 'flex'
    editForm.style.display = 'none'
})
}
if(subBtn) {
    subBtn.addEventListener("click", () => {
    editBtn.style.display = 'flex'
    cslBtn.style.display = 'flex'
    editForm.style.display = 'none'
})  
}
let msgBtn = document.querySelector(".msg_btn")
let msgDiv = document.querySelector(".cardel_msg")
if(msgBtn) {
    msgBtn.addEventListener("click", () => {
        msgDiv.style.display = 'none'
    })
}
if(avatarDiv) {
    avatarDiv.addEventListener("click", () => {
        avatarPop.style.display = 'flex'
    })
}
if(noAvatarBtn) {
    noAvatarBtn.addEventListener("click", () => {
        avatarPop.style.display = 'none'
    })
}
if(addAvatarBtn) {
    addAvatarBtn.addEventListener("click", () => {
        avatarPop.style.display = 'none'
    })
}
if(errMsgBtn) {
    errMsgBtn.addEventListener("click", () => {
        errMsgDiv.style.display = 'none';
    }) 
}
//Cancel USER
let cancelUsr = document.querySelector(".clsBtn")
let yesDelUsr = document.querySelector("#yes_del_usr")
let noDelUsr = document.querySelector("#no_del_usr")
let popupUsr = document.querySelector(".user_popup")

if(cancelUsr) {
    cancelUsr.addEventListener("click", () => {
        popupUsr.style.display = 'flex'
    })
}
if(yesDelUsr) {
    yesDelUsr.addEventListener("click", () => {
        popupUsr.style.display = 'none'
    })
}
if(noDelUsr) {
    noDelUsr.addEventListener("click", () => {
        popupUsr.style.display = 'none'
    })
}
//PICTURE SLIDER
let imgDiv = document.querySelector(".galery_in")
let images = document.querySelectorAll(".galery_in img")
if(images[0] !== undefined) {
    displayNone()
    images[0].style.display = "block"
}
//images[0].classList.add("visible")
let numPics = images.length
let imgNum = 0
let bckDiv = document.querySelector(".bckDiv")
let xmark = document.querySelector("#xmark")
let left = document.querySelector("#left")
let smallLeft = document.querySelector("#smallLeft")
let right = document.querySelector("#right")
let smallRight = document.querySelector("#smallRight")
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
if(imgDiv) {
   imgDiv.addEventListener("click", zoomIn) 
}
if(xmark) {
   xmark.addEventListener("click", zoomOut) 
}
if(right) {
    right.addEventListener("click", () => {
        displayNone()
        imgNum++
        if(imgNum == numPics) {
            imgNum = 0
        }
        images[imgNum].style.display = "block"
    })
}
if(smallRight) {
    smallRight.addEventListener("click", () => {
        displayNone()
        imgNum++
        if(imgNum == numPics) {
            imgNum = 0
        }
        images[imgNum].style.display = "block"
    })
}
if(left) {
    left.addEventListener("click", () => {
        displayNone()
        imgNum--
        if(imgNum == -1) {
            imgNum = numPics -1
        }
        images[imgNum].style.display = "block"
    }) 
}
if(smallLeft) {
    smallLeft.addEventListener("click", () => {
        displayNone()
        imgNum--
        if(imgNum == -1) {
            imgNum = numPics -1
        }
        images[imgNum].style.display = "block"
    }) 
}
// EDIT CAR Button and Form
let carBtn = document.querySelector(".car_title i:last-of-type")
let editCarForm = document.querySelector(".edit_car_form")
let cancelForm = document.querySelector(".edit_car_form i")
let submitForm = document.querySelector(".edit_car_form button")
let resDiv = document.querySelector(".res_form")
let resBtn = document.querySelector("#res_btn")
if(carBtn) {
    carBtn.addEventListener("click", () => {
        editCarForm.style.display = 'flex'
    })
}
if(cancelForm) {
    cancelForm.addEventListener("click", () => {
        editCarForm.style.display = 'none'
    })
}
if(submitForm) {
    submitForm.addEventListener("click", () => {
        console.log("form dugme radi")
        editCarForm.style.display = 'none'
        resDiv.style.display = 'flex'
    })
}
if(resBtn) {
    resBtn.addEventListener("click", () => {
        console.log("OK dugme radi")
        resDiv.style.display = 'none'
    })
}
//Cancel CAR
let cancelCar = document.querySelector(".manage_car i:first-of-type")
let yesDel = document.querySelector("#yes_del")
let noDel = document.querySelector("#no_del")
let popup = document.querySelector(".popup")

if(cancelCar) {
    cancelCar.addEventListener("click", () => {
        popup.style.display = 'flex'
    })
}
if(yesDel) {
    yesDel.addEventListener("click", () => {
        popup.style.display = 'none'
    })
}
if(noDel) {
    noDel.addEventListener("click", () => {
        popup.style.display = 'none'
    })
}