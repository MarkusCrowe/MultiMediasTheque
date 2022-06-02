



// moveDiv.addEventListener("click", () => {
//     countClick++
//     console.log(countClick)
//     const container = document.querySelector(".red")
//     if (countClick === 1) {
//         container.animate(
//             cardinalMoveNorth,
//             cardinalTime
//         )
//     }
//     else if(countClick === 2) {
//         container.animate(
//             cardinalMoveWest,
//             cardinalTime,
//             modal.style.display="block",
//             countClick = 0
//         )
//     }
// })

document.addEventListener("DOMContentLoaded", function(){
    let account = document.getElementById("account")
    let accountMenu = document.getElementById("account-menu")
    let accountClick = true

    account.addEventListener("click", function(){
        accountClick = !accountClick
        if(accountClick === true){
            accountMenu.classList.remove("show")
            accountMenu.classList.add("hide")
        } else {
            accountMenu.classList.remove("hide")
            accountMenu.classList.add("show")  
        }
    })
})
