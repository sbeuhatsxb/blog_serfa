//Attente de la fin du chargement du DOM
window.addEventListener("DOMContentLoaded", (event) => {
    //On cache le formulaire de changement de mot de passe par défaut
    document.getElementById("formHidden").style.display = "none";
    var result = document.getElementById("result");
});


var getHttpRequest = function () {
    var httpRequest = false;

    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType('text/xml');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {}
        }
    }

    if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance XMLHTTP');
        return false;
    }

    return httpRequest
}

function reply_click(clicked_id) {
    //Préparation HttpRequest
    var xhr = getHttpRequest();
    xhr.open('GET', '/src/update_user.php', true);
    // On envoie un header pour indiquer au serveur que la page est appellée en Ajax
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    // On lance la requête
    xhr.send();

    //*****************************
    //****** Code spécifique ******
    //*****************************


    //On récupère l'id du bouton sur lequel on a cliqué
    var id = document.getElementById(clicked_id);
    //On enregistre l'email du l'utilsateur pour send AJAX
    var email = document.getElementById("user_mail");

    //Enregistrement de l'ancienne valeur
    var oldvalue = id.innerText;
    //On fait disparaitre le bouton
    id.style.display = "none";


    //Préparation de data
    if (clicked_id == 'hash') {
        var data = new FormData();
        data.append('hash', 1);

        //Envoi des données à xhr
        xhr.open('POST', '/src/update_user.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.send(data);

        //Récupération des informations de la page distante
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    xhr.responseText; // contient le résultat de la page
                    result.innerText = xhr.responseText;
                    console.log(xhr.responseText);
                } else {
                    // Le serveur a renvoyé un status d'erreur
                }
            }
        }
        //Si le bouton n'est pas celui du mot de passe :
    } else if (clicked_id != 'pwd') {
        //On demande à l'utilisateur sa nouvelle valeur
        var newname = prompt("Nouvelle valeur");
        //Si le nouveau nom est vide on garde l'ancien
        if (newname == "") {
            id.innerText = oldvalue;
        } else {
            //Sinon on remplace le texte affiché par le nouveau texte
            id.innerText = "\xa0" + newname + "\xa0";
            //Et on prépare les données envoyées en POST pour le traitement en BDD
            var data = new FormData();
            data.append('value', newname);
            data.append('id', clicked_id);
        }

        //Envoi des données à xhr
        xhr.open('POST', '/src/update_user.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.send(data);

        //Récupération des informations de la page distante
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    xhr.responseText; // contient le résultat de la page
                    result.innerText = xhr.responseText;
                    console.log(xhr.responseText);
                } else {
                    // Le serveur a renvoyé un status d'erreur
                }
            }
        }

    } else {
        //Reste id = pwd
        //On affiche le formulaire
        document.getElementById("formHidden").style.display = "block";
    }

    //*********************************
    //****** Fin code spécifique ******
    //*********************************
    //On réaffiche le bouton
    id.style.display = "unset";





}