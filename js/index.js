//SEARCH

let search = document.querySelector("#find")
let searchDiv = document.querySelector(".searchForm")
let searchBtn = document.querySelector(".searchForm form button")

if(search) {
    search.addEventListener("click", () => {
        if(searchDiv) {
            if(!searchDiv.classList.contains("show")) {
                if(searchDiv.classList.contains("hide")) {
                    searchDiv.classList.remove("hide")
                }
                searchDiv.classList.add("show")
            } else {
                searchDiv.classList.remove("show")
                searchDiv.classList.add("hide")
            }
        }
    })
}
if(searchBtn) {
    searchBtn.addEventListener("click", () => {
        console.log("btnListen")
        searchDiv.classList.remove("show")
        searchDiv.classList.add("hide")
    }) 
}
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
    images[0].setAttribute("id", "carImg")
}
//images[0].classList.add("visible")
let numPics = images.length
let imgNum = 0
let bckDiv = document.querySelector(".bckDiv")
let xmark = document.querySelector("#xmark")
let left = document.querySelector("#left")
let smallLeft = document.querySelector("#imgDivLeft")
let right = document.querySelector("#right")
let smallRight = document.querySelector("#imgDivRight")
function zoomIn() {
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
        img.removeAttribute("id")
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
        images[imgNum].setAttribute("id", "carImg")
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
        images[imgNum].setAttribute("id", "carImg")
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
        images[imgNum].setAttribute("id", "carImg")
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
        images[imgNum].setAttribute("id", "carImg")
    }) 
}
// EDIT CAR Button and Form
let carMenuOpen = document.querySelector(".car_title i:last-of-type")
let carEdtMenu = document.querySelector(".car_aside")
let clsMenu = document.querySelector("#close")

if(carMenuOpen) {
    carMenuOpen.addEventListener("click", () => {
        if(carEdtMenu.classList.contains("edit_menu_out")) {
            carEdtMenu.classList.remove("edit_menu_out")
        }
        carEdtMenu.classList.add("edit_menu_in")
    })
}
if(clsMenu) {
    clsMenu.addEventListener("click", () => {
        if(carEdtMenu.classList.contains("edit_menu_in")) {
            carEdtMenu.classList.remove("edit_menu_in")
        }
        carEdtMenu.classList.add("edit_menu_out")
    })
}

let carBtn = document.querySelector("#edit_car") //.car_title i:last-of-type
let editCarForm = document.querySelector(".edit_car_form")
let cancelForm = document.querySelector(".edit_car_form i")
let submitForm = document.querySelector(".edit_car_form button")
let resDiv = document.querySelector(".res_form")
let resBtn = document.querySelector("#res_btn")
if(carBtn) {
    carBtn.addEventListener("click", () => {
        editCarForm.style.display = 'flex'
        if(carEdtMenu.classList.contains("edit_menu_in")) {
            carEdtMenu.classList.remove("edit_menu_in")
        }
        carEdtMenu.classList.add("edit_menu_out")
    })
}
if(cancelForm) {
    cancelForm.addEventListener("click", () => {
        editCarForm.style.display = 'none'
    })
}
if(submitForm) {
    submitForm.addEventListener("click", () => {
        editCarForm.style.display = 'none'
        resDiv.style.display = 'flex'
    })
}
if(resBtn) {
    resBtn.addEventListener("click", () => {
        resDiv.style.display = 'none'
    })
}
//Cancel CAR
let cancelCar = document.querySelector("#remove_car") // .manage_car i:first-of-type
let yesDel = document.querySelector("#yes_del")
let noDel = document.querySelector("#no_del")
let popup = document.querySelector(".popup")

if(cancelCar) {
    cancelCar.addEventListener("click", () => {
        popup.style.display = 'flex'
        if(carEdtMenu.classList.contains("edit_menu_in")) {
            carEdtMenu.classList.remove("edit_menu_in")
        }
        carEdtMenu.classList.add("edit_menu_out")
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
//Cancel car img
let removePhotoBtn = document.querySelector("#remove_photo")
if(removePhotoBtn) {
    removePhotoBtn.addEventListener("click", () => {
        if(carEdtMenu.classList.contains("edit_menu_in")) {
            carEdtMenu.classList.remove("edit_menu_in")
        }
        carEdtMenu.classList.add("edit_menu_out")
    })
}
let carImages = document.querySelectorAll(".one_img img")
let imgCont = document.querySelectorAll(".one_img")
let picInput = document.querySelector("#picarr")
let imgToRemove = []
if(imgCont) {
    imgCont.forEach(cont => {
        cont.addEventListener("click", (e) => {
            console.log(e.target.firstChild)
            if(e.target.classList.contains("clickedImg")) {
                e.target.classList.remove("clickedImg")
                e.target.classList.add("unclickedImg")
            } else if(e.target.classList.contains("unclickedImg")) {
                e.target.classList.remove("unclickedImg")
                e.target.classList.add("clickedImg")
            } else {
                e.target.classList.add("clickedImg")
            }
            /*
            let picStr = e.target.firstChild.getAttribute("src")
            let ind = picStr.indexOf("/")
            let picName = picStr.slice(ind+1)
            */
            let picID = e.target.firstChild.getAttribute("id")
            if(!imgToRemove.includes(picID)) { // Here was a picName - look at the logic above
                imgToRemove.push(picID)
                console.log(imgToRemove)
                picInput.value = imgToRemove
            } else {
                let picInd = imgToRemove.indexOf(picID)
                imgToRemove.splice(picInd, 1)
                console.log(imgToRemove)
                picInput.value = imgToRemove
            }
            
        })
    })
    
}
if(carImages) {
    carImages.forEach(img => {
        img.addEventListener("click", (e) => {
            console.log(e.target.parentNode)
            if(e.target.parentNode.classList.contains("clickedImg")) {
                e.target.parentNode.classList.remove("clickedImg")
                e.target.parentNode.classList.add("unclickedImg")
            } else if(e.target.parentNode.classList.contains("unclickedImg")) {
                e.target.parentNode.classList.remove("unclickedImg")
                e.target.parentNode.classList.add("clickedImg")
            } else {
                e.target.parentNode.classList.add("clickedImg")
            }
            /*
            let picStr = e.target.getAttribute("src")
            let ind = picStr.indexOf("/")
            let picName = picStr.slice(ind+1)
            */
            let picID = e.target.getAttribute("id")
            if(!imgToRemove.includes(picID)) {
                imgToRemove.push(picID)
                console.log(imgToRemove)
                picInput.value = imgToRemove
            } else {
                let picInd = imgToRemove.indexOf(picID)
                imgToRemove.splice(picInd, 1)
                console.log(imgToRemove)
                picInput.value = imgToRemove
            }
            e.stopPropagation()
        })
    })
}

let confirmBtn = document.querySelector("#confirm")
let myMsg = document.querySelector(".mymsg")
if(confirmBtn) {
    confirmBtn.addEventListener("click", () => {
        myMsg.style.display = 'block';
    })
}

// AJAX Form
let brSelect = document.querySelector("#brands") 
let models = document.querySelector("#models")
if(brSelect) {
    brSelect.addEventListener("change", () => {
        models.innerHTML = `<option value="">--Choose the model--</option>`
        let str = brSelect.value
        let arr = str.split(" ")
        let brandID = arr[0]
        arr.splice(0, 1)
        if(brSelect.value != "") {
            const xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = () => {
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(JSON.parse(xhttp.responseText))
                    let result = JSON.parse(xhttp.responseText)
                    for(let r of result.models) {
                        models.innerHTML += `<option value='${r}'>${r}</option>`
                    } 
                }
            }
            xhttp.open("GET", "./getmodels.php?brandID=" + brandID, true)
            xhttp.send()
        }
    })
}
// AJAX - edit
let brSelect2 = document.querySelector("#brand") 
let models2 = document.querySelector("#model")
if(brSelect2) {
    brSelect2.addEventListener("change", () => {
        models2.innerHTML = `<option value="">--Choose the model--</option>`
        let str = brSelect2.value
        let arr = str.split(" ")
        let brandID = arr[0]
        arr.splice(0, 1)
        if(brSelect2.value != "") {
            const xhttp = new XMLHttpRequest()
            xhttp.onreadystatechange = () => {
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(JSON.parse(xhttp.responseText))
                    let result = JSON.parse(xhttp.responseText)
                    for(let r of result.models) {
                        models2.innerHTML += `<option value='${r}'>${r}</option>`
                    } 
                }
            }
            xhttp.open("GET", "./getmodels.php?brandID=" + brandID, true)
            xhttp.send()
        }
    })
}