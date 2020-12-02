<?php include "includes/header.php"
?>
<main>
    <h2>Contact</h2>
    <p>Page de contact</p>
    <form name="contactForm" action="#" method="post" novalidate onSubmit="verifForm();return false;">
        <p>Les informations obligatoires sont suivies d'un *</p>
        <div id="message"></div>
        <fieldset>
            <legend>Envoyer un message</legend>
            <p>Mlle <input type="radio" name="civ" value="mlle"/>Mme <input type="radio" name="civ" value="mme"/>M
                <input type="radio" name="civ" value="m"/></p>
            <p><label for="name">Nom*</label><input required type="text" name="name" id="name"/></p>
            <p><label for="surname">Prénom*</label><input required type="text" name="surname" id="surname"/></p>
            <p><label for="mail">Adresse mail*</label><input required type="email" name="mail" id="mail"/></p>
            <p><input type="checkbox" name="sendmail" id="sendmail"/> <label for="sendmail">copie du message</label></p>
            <p><label for="tel">Numéro de téléphone</label><input type="tel" name="tel" id="tel"/></p>
            <p><label for="subject">Sujet du message*</label><input required type="text" name="subject" id="subject"/>
            <p><label for="content">Contenu du message*</label>
                <textarea required name="content" id="content"></textarea></p>
            <p><input required type="checkbox" name="rgpd" id="rgpd"/> <label for="rgpd">Accepter les conditions
                    RGPD</label></p>
            <p><img id="captcha" src="../images/captcha.gif" alt="captcha"/></p>
            <p><label for="captcha_txt">Saisir le texte ci-dessus</label><input required type="text" name="captcha"
                                                                                id="captcha_txt"/></p>
            <p><input class="btn btn-primary" type="submit" value="Envoyer le message"/></p>
        </fieldset>
    </form>
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85245.75141192738!2d7.322364206894916!3d48.11159122156081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479165dff670c1cf%3A0xe35d7e3e616ce966!2s68000+Colmar!5e0!3m2!1sfr!2sfr!4v1539164589375"
                allowfullscreen></iframe>
    </div>
</main>
<?php include "includes/footer.php" ?>
<script>src = "assets/js/veriform.js</script>
</body>
</html>