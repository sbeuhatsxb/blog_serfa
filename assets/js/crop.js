//Attente de la fin du chargement du DOM
window.addEventListener("DOMContentLoaded", (event) => {
    taille = 200;
    if(document.body.clientWidth < 900){
        taille = 100;
    }
    arrContent = document.getElementsByClassName("content");
    for (i=0; i<arrContent.length;i++){
        texte = arrContent[i].innerHTML
        arrContent[i].innerHTML = texte.substr(0, taille)+"...";
    }
});

