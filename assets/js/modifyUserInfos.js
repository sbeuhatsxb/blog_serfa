function reply_click(clicked_id) {
    var getHttpRequest = function () {
        var httpRequest = false;

        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType('text/xml');
        }

        if (!httpRequest) {
            alert('Abandon :( Impossible de créer une instance XMLHTTP');
            return false;
        }

        return httpRequest;
    }

    var xhr = getHttpRequest();
    xhr.open('GET', 'src/update_user.php', true);
    // On envoit un header pour indiquer au serveur que la page est appellée en Ajax
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    // On lance la requête
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                xhr.responseText; // contient le résultat de la page
            } else {
                // Le serveur a renvoyé un status d'erreur
            }
        }
    }


    //On récupère l'id du bouton sur lequel on a cliqué
    var id = document.getElementById(clicked_id);
    //On enregistre l'email du l'utilsateur pour send AJAX
    var email = document.getElementById("user_mail");

    //Enregistrement de l'ancienne valeur
    var oldvalue = id.innerText;
    //On fait disparaitre le bouton
    id.style.display = "none";
    //On demande à l'utilisateur sa nouvelle valeur
    var newname = prompt("Nouvelle valeur");
    //Si le bouton n'est pas celui du mot de passe :
    if(clicked_id != 'user_pwd'){
        //Si le nouveau nom est vide on garde l'ancien
        if (newname == "") {
            id.innerText = oldvalue;
        } else {
            //Sinon on remplace le texte affiché par le nouveau texte
            id.innerText = "\xa0"+newname+"\xa0";
            //Et on prépare les données envoyées en POST pour le traitement en BDD
            var data = new FormData();
            data.append('value', newname)
            data.append('id', clicked_id)
            data.append('email', email.innerText)
        }
        //Sinon cela concerne le mot de passe
    } else {
        //Si le mot de passe n'est pas vide sinon
        if (newname != ""){
            //TODO : Hasher le mot de passe -->value
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 15});
            hashObj.update(newname);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value);
            //Envoi du mot de passe
            var data = new FormData();
            data.append('value', newname)
            data.append('id', clicked_id)
            data.append('email', email.innerText)
        } else {
            alert("Le mot de passe n'a pas été modifié")
        }
    }

    //On réaffiche le bouton
    id.style.display = "unset";

    var xhr = getHttpRequest();
    xhr.open('POST', 'src/update_user.php', true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send(data);
}



