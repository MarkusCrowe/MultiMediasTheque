document.addEventListener("DOMContentLoaded", function(){

    let hamburgerMenu = document.querySelector(".hamburger")
    let crossMenu = document.querySelector(".cross")
    let toggleMenu = document.querySelector(".toggle")
    let menu = true

    hamburgerMenu.addEventListener("click", function(){
        menu = !menu
        if(menu === true){
            toggleMenu.classList.remove("show")
            toggleMenu.classList.add("hide")

            hamburgerMenu.classList.remove("hide")
            crossMenu.classList.add("hide")
        } else {
            toggleMenu.classList.remove("hide")
            toggleMenu.classList.add("show")  

            hamburgerMenu.classList.add("hide")
            crossMenu.classList.remove("hide")
        }
    })
    crossMenu.addEventListener("click", function(){
        menu = !menu
        if(menu === true){
            toggleMenu.classList.remove("show")
            toggleMenu.classList.add("hide")

            hamburgerMenu.classList.remove("hide")
            crossMenu.classList.add("hide")
        } else {
            toggleMenu.classList.remove("hide")
            toggleMenu.classList.add("show")  

            hamburgerMenu.classList.add("hide")
            crossMenu.classList.remove("hide")
        }
    })

})