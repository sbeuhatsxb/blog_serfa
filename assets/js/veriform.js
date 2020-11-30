function verifForm(){
    var texte_a_afficher 	= "";
    var message_class 		= "error";
    if (document.contactForm.captcha.value != "W68HP"){
        texte_a_afficher = "<p>Le captcha est faux</p>";
        document.contactForm.captcha.className = message_class;
    }

    if (texte_a_afficher == ""){
        texte_a_afficher = "Formulaire envoyé";
        message_class 	 = "valid";
    }
    var objMessage = document.getElementById("message");
    objMessage.innerHTML = texte_a_afficher;
    objMessage.className = message_class;
}