//SEARCH
let smallSearch = document.querySelector("#findCar")
let search = document.querySelector("#find")
let searchDiv = document.querySelector(".searchForm")
let searchBtn = document.querySelector(".searchForm form button")

if(smallSearch) {
    smallSearch.addEventListener("click", () => {
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
    if(cslBtn) {
       cslBtn.style.display = 'none' 
    }
    editForm.style.display = 'flex'
})
}
if(noEdit) {
    noEdit.addEventListener("click", () => {
    editBtn.style.display = 'flex'
    if(cslBtn) {
        cslBtn.style.display = 'flex' 
    }
    editForm.style.display = 'none'
})
}
if(subBtn) {
    subBtn.addEventListener("click", () => {
    editBtn.style.display = 'flex'
    if(cslBtn) {
        cslBtn.style.display = 'flex' 
    }
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
let msg = document.querySelector(".mymsg")
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
        if(resDiv) {
            resDiv.style.display = 'none'   
        }
        if(msg) {
            console.log("msg-div")
            msg.style.display = 'none';
        }
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
// SEND THE MSG TO THE OWNER
let msgBox = document.querySelector("#msg_box")
let writeMsg = document.querySelector("#writeMsg")
let noMsgBtn = document.querySelector("#cancel_msg_btn")
let sendMsgBtn = document.querySelector("#send_btn")
if(msgBox) {
    msgBox.addEventListener("click", () => {
        writeMsg.style.display = 'flex'
    })
}
if(noMsgBtn) {
    noMsgBtn.addEventListener("click", () => {
        writeMsg.style.display = 'none'
    })
}
if(sendMsgBtn) {
    sendMsgBtn.addEventListener("click", () => {
        writeMsg.style.display = 'none'
    })
}
let reply = document.querySelectorAll(".rep")
let noRep = document.querySelectorAll(".no_rep")
let sendRep = document.querySelectorAll(".send_rep")
let repMsg = document.querySelectorAll(".writeMsg")
if(reply) {
    reply.forEach(r => {
        r.addEventListener("click", (e) => {
            let btnID = e.target.getAttribute("data-id")
            repMsg.forEach(rep => {
                if(rep.getAttribute("id") == btnID) {
                    console.log("good")
                    rep.style.display = 'flex'
                } else {
                    console.log(btnID)
                    console.log(rep.getAttribute("id"))
                }
            }) 
        })
    })
    
}
if(noRep) {
    noRep.forEach(n => {
        n.addEventListener("click", (e) => {
            let btnID = e.target.getAttribute("data-id")
            repMsg.forEach(rep => {
                if(rep.getAttribute("id") == btnID) {
                    rep.style.display = 'none'
                } else {
                    console.log(btnID)
                    console.log(rep.getAttribute("id"))
                }
            }) 
        })
    })
}
if(sendRep) {
    sendRep.forEach(s => {
        s.addEventListener("click", (e) => {
            let btnID = e.target.getAttribute("data-id")
            repMsg.forEach(rep => {
                if(rep.getAttribute("id") == btnID) {
                    console.log("good")
                    rep.style.display = 'none'
                } else {
                    console.log(btnID)
                    console.log(rep.getAttribute("id"))
                }
            }) 
        })
    })
}
// INBOX Page
let recTab = document.querySelector(".received_tab")
let sentTab = document.querySelector(".sent_tab")
let delTab = document.querySelector(".del_tab")

let recMsg = document.querySelectorAll(".rec_msg")
let recSucc = document.querySelectorAll(".rec_succ")
let sentMsg = document.querySelectorAll(".sent_msg")
let sentSucc = document.querySelectorAll(".sent_succ")
let delMsg = document.querySelectorAll(".del_msg")
let delSucc = document.querySelectorAll(".del_succ")

function recTabOn() {
    recTab.style.backgroundColor = 'white'
    sentTab.style.backgroundColor = '#D7D7D7'
    delTab.style.backgroundColor = '#D7D7D7'
    if(recMsg) {
        recMsg.forEach(msg => {
            msg.style.display = 'flex'
        })
        if(sentMsg) {
            sentMsg.forEach(msg => {
                msg.style.display = 'none'
            })
            
        }
        if(sentSucc) {
            sentSucc.forEach(msg => {
                msg.style.display = 'none'
            })
        }
        if(delMsg) {
            delMsg.forEach(msg => {
                msg.style.display = 'none'
            })
        }
        if(delSucc) {
            delSucc.forEach(msg => {
                msg.style.display = 'none'
            })
        }
    } else if(recSucc) {
        recSucc.forEach(msg => {
            msg.style.display = 'flex'
        })
        if(sentMsg) {
            sentMsg.forEach(msg => {
                msg.style.display = 'none'
            })
        }
        if(sentSucc) {
            sentSucc.forEach(msg => {
                msg.style.display = 'none'
            })
        }
        if(delMsg) {
            delMsg.forEach(msg => {
                msg.style.display = 'none'
            })
        }
        if(delSucc) {
            delSucc.forEach(msg => {
                msg.style.display = 'none'
            })
        }
    }
}

if(recTab) {
    recTab.addEventListener("click", recTabOn)
}
window.addEventListener("load", () => {
    if(recTab) {
        recTabOn()
    }
})
if(sentTab) {
    sentTab.addEventListener("click", () => {
        sentTab.style.backgroundColor = 'white'
        recTab.style.backgroundColor = '#D7D7D7'
        delTab.style.backgroundColor = '#D7D7D7'
        if(sentMsg) {
            sentMsg.forEach(msg => {
                msg.style.display = 'flex'
            })
            if(recMsg) {
                recMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(recSucc) {
                recSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(delMsg) {
                delMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(delSucc) {
                delSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
        } else if(sentSucc) {
            sentSucc.forEach(msg => {
                msg.style.display = 'flex'
            })
            if(recMsg) {
                recMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(recSucc) {
                recSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(delMsg) {
                delMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(delSucc) {
                delSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
        }
    })
}
if(delTab) {
    delTab.addEventListener("click", () => {
        delTab.style.backgroundColor = 'white'
        sentTab.style.backgroundColor = '#D7D7D7'
        recTab.style.backgroundColor = '#D7D7D7'
        if(delMsg) {
            delMsg.forEach(msg => {
                msg.style.display = 'flex'
            })
            if(recMsg) {
                recMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(recSucc) {
                recSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(sentMsg) {
                sentMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(sentSucc) {
                sentSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
        } else if(delSucc) {
            delSucc.forEach(msg => {
                msg.style.display = 'flex'
            })
            if(recMsg) {
                recMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(recSucc) {
                recSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(sentMsg) {
                sentMsg.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
            if(sentSucc) {
                sentSucc.forEach(msg => {
                    msg.style.display = 'none'
                })
            }
        }
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
// MEDIA small screen elements
let menuBtn = document.querySelector("#menu_btn")
let smallMenu = document.querySelector(".bar_small_menu")
let closeSmall = document.querySelector("#close_small_menu")
let menuLinks = document.querySelectorAll(".bar_small_menu a")

if(menuBtn) {
    menuBtn.addEventListener("click", () => {
        if(smallMenu.classList.contains("smallOut")) {
            smallMenu.classList.remove("smallOut")
        }
        smallMenu.classList.add("smallIn")
    })
}
if(closeSmall) {
    closeSmall.addEventListener("click", () => {
        if(smallMenu.classList.contains("smallIn")) {
            smallMenu.classList.remove("smallIn")
        }
        smallMenu.classList.add("smallOut")
    })
}
if(menuLinks) {
    menuLinks.forEach(link => {
        link.addEventListener("click", () => {
            if(smallMenu.classList.contains("smallIn")) {
                smallMenu.classList.remove("smallIn")
            }
            smallMenu.classList.add("smallOut")
        })
    })
}
// PART II
let closeSearch = document.querySelector("#closeSearch")
if(closeSearch) {
    closeSearch.addEventListener("click", () => {
        console.log("small btn works")
        searchDiv.classList.remove("show")
        searchDiv.classList.add("hide")
    })
}