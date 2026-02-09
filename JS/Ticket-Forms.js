console.log("Ticket-Forms.js loaded");


function chek_ticket_success() {
    let res = 0;

    const TITLE_INPUT = document.querySelector("#ticket-title");
    const CLIENT_INPUT = document.querySelector("#ticket-client");

    const TITLE_ERROR = document.querySelector("#title_error");

    if (TITLE_INPUT.value == "") {

        TITLE_ERROR.classList.remove("titanic");
        res ++;
        
    } else {
        TITLE_ERROR.classList.add("titanic");
    }

    const CLIENT_ERROR = document.querySelector("#client_error");

    if(CLIENT_INPUT.value == ""){
         CLIENT_ERROR.classList.remove("titanic");
        res ++;
    }
    else{
        CLIENT_ERROR.classList.add("titanic");
    }

    return res;

    
}

const SUBMIT_TICKET = document.querySelector("#submitform_ticket");

SUBMIT_TICKET.addEventListener("submit", function(event) {
       // on empeche la soumission du formulaire
    // pour éviter le rechargement de page
    event.preventDefault();

    let error = 0;
    error += chek_ticket_success();

    if (error == 0) {
        

        // on peut soumettre le formulaire
        // ici on peut faire une requete ajax pour envoyer les données du formulaire
        console.log("formulaire soumis");

        const TITLE_INPUT = document.querySelector("#ticket-title");
        const CLIENT_INPUT = document.querySelector("#ticket-client");

        console.log("title: " + TITLE_INPUT.value);
        console.log("Client: " + CLIENT_INPUT.value);


        TITLE_INPUT.value = "";
        CLIENT_INPUT.value = "";
    }

    
    });

    // On veut gérer les filtres
// je selectionne tous les filtres
const filtres = document.querySelectorAll(".filter-btn");

console.log("hi")

for (let i= 0; i < filtres.length; i++) {
    console.log("hi2")
   
    filtres[i].addEventListener("click", function(event) {
        event.preventDefault();
        // Texte du bouton
        console.log(filtres[i].innerText);

        const trs = document.querySelectorAll('#content tbody tr');

        // Je veux parcourir mon tableau
        for (let j=0; j < 2 ; j++) {
            console.log(trs[j]);
            const statut = trs[j].querySelector(".Statut");
            // texte de la case dans le tableau
            console.log(statut.innerText);

            // Je veux comparer mon texte du bouton, avec celui de la case du tableau
            // Si le texte est différent, on cache la ligne
            if (filtres[i].innerText.toLowerCase() != stat.innerText.toLowerCase()) {
                // On cache toute la ligne (= le tr)
                trs[j].classList.add('titanic');
            } else {
                trs[j].classList.remove('titanic');
            }

        }

        for (let j=0; j < 2 ; j++) {
            console.log(trs[j]);
            const MONEY = trs[j].querySelector(".Money");
            // texte de la case dans le tableau
            console.log(statut.innerText);

            // Je veux comparer mon texte du bouton, avec celui de la case du tableau
            // Si le texte est différent, on cache la ligne
            if (filtres[i].innerText.toLowerCase() != MONEY.innerText.toLowerCase()) {
                // On cache toute la ligne (= le tr)
                trs[j].classList.add('titanic');
            } else {
                trs[j].classList.remove('titanic');
            }

        }

    });

}
