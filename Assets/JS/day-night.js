 document.addEventListener("DOMContentLoaded", function(){

    let shift = document.querySelector(":root");
    let sun = document.querySelector(".sun");
    let moon = document.querySelector(".moon");
    let mode = true;
    
    sun.addEventListener("click", function(){
        mode = !mode
        if(mode !== true){
            sun.classList.add("hide")
            moon.classList.remove("hide")
            // night_get()
            night_set()
        }
    })
    moon.addEventListener("click", function(){
        mode = !mode
        if(mode === true){
            sun.classList.remove("hide")
            moon.classList.add("hide")
            day_set()
        }
    })

    function night_set(){
        shift.style.setProperty("--template-background", "black");
        shift.style.setProperty("--template-color", "white");
        shift.style.setProperty("--template-border", "white");
        shift.style.setProperty("--html-background", "rgb(140, 140, 140)");
        shift.style.setProperty("--list-color", "rgb(209, 209, 209)");       
        shift.style.setProperty("--title-color", "rgb(219, 219, 219)");
        shift.style.setProperty("--home-article-color", "rgb(57, 57, 57)");
        shift.style.setProperty("--home-article-shadow", "rgb(225, 225, 225)");
        shift.style.setProperty("--article-title", "black");
        shift.style.setProperty("--formulaire-title", "white");
        shift.style.setProperty("--nav-background", "rgb(35, 35, 35)");
        shift.style.setProperty("--nav-color", "rgb(194, 194, 194)");
        shift.style.setProperty("--admin-list", "rgb(37, 37, 37)");
        shift.style.setProperty("--admin-text-list", "white");
        shift.style.setProperty("--chats", "rgb(21, 21, 21)");
        shift.style.setProperty("--chats-text", "white");
        shift.style.setProperty("--menu-background", "rgb(21, 21, 21)");
        shift.style.setProperty("--menu-color", "white");
    }

    function day_set(){
        shift.style.setProperty("--template-background", "rgb(220, 220, 173)");
        shift.style.setProperty("--template-color", "black");
        shift.style.setProperty("--template-border", "black");
        shift.style.setProperty("--html-background", "rgb(172, 172, 133)");
        shift.style.setProperty("--list-color", "rgb(68, 68, 68)");
        shift.style.setProperty("--title-color", "rgb(15, 15, 15)");
        shift.style.setProperty("--home-article-color", "rgb(228, 228, 195)");
        shift.style.setProperty("--home-article-shadow", "rgb(100, 100, 87)");
        shift.style.setProperty("--article-title", "white");
        shift.style.setProperty("--formulaire-title", "black");
        shift.style.setProperty("--nav-background", "rgb(237, 237, 203)");
        shift.style.setProperty("--nav-color", "rgb(70, 70, 70)");
        shift.style.setProperty("--admin-list", "whitesmoke");
        shift.style.setProperty("--admin-text-list", "black");
        shift.style.setProperty("--chats", "beige");
        shift.style.setProperty("--chats-text", "black");
        shift.style.setProperty("--menu-background", "beige");
        shift.style.setProperty("--menu-color", "black");
    }
 })
