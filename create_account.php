<?php include "includes/header.php"
?>
<main>
    <h2>Créer un compte</h2>
    <p>Page de création de compte</p>
    <form action="includes/createUser.php" name="formCreateAccount" method="post" >
        <fieldset>
            <legend>Informations utilisateur</legend>
            <p><label for="name">Nom</label><input type="text" name="name" id="name" /></p>
            <p><label for="firstname">Prénom</label><input type="text" name="firstname" id="firstname" /></p>
            <p><label for="mail">Mail</label><input type="email" name="mail" id="mail" /></p>
        </fieldset>
        <fieldset>
            <legend>Informations de connexion</legend>
            <p><label for="passwd">Mot de passe</label><input type="password" name="passwd" id="passwd" />
                <label for="confirmPwd">Confirmation</label><input type="password" name="confirmPwd" id="confirmPwd" /></p>
        </fieldset>
        <input type="submit" value="Créer"/> <input type="reset" value="Annuler" />
    </form>

</main>

<?php include "includes/footer.php"?>

</body>
</html>