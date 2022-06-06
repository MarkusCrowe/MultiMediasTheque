document.addEventListener("DOMContentLoaded", function(){
let heuresDiv = document.querySelector(".heures");
let dateDiv = document.querySelector(".date");

let affichageheure = function(){
    let today, annee, listeMois, mois, listeJours, jourNumero, joursNom, heures, minutes, secondes, deuxChiffres;

    today = new Date();

    annee = today.getFullYear();

    listeMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    mois = listeMois[today.getMonth()];

    jourNumero = today.getDate();

    listeJours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    joursNom = listeJours[today.getDay()];

    deuxChiffres = function(element){
        if(element<10){
            return element = "0" + element;
        }else{
            return element;
        }
    }

    heures = deuxChiffres(today.getHours());
    minutes = deuxChiffres(today.getMinutes());
    secondes = deuxChiffres(today.getSeconds());

    heuresDiv.textContent = heures + ":" + minutes + ":" + secondes; 
    dateDiv.textContent = joursNom + "," + jourNumero + " " + mois + " " + annee;

    setTimeout(affichageheure, 1000);
}

affichageheure();

})