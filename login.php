<?php include "includes/header.php"
?>
<main>

    <h2>Se connecter</h2>
    <p>Page de connexion</p>
    <form action="src/logingin.php" name="formConnect" method="post" >
        <p><label for="mail">Mail</label><input type="email" name="mail" id="mail" /></p>
        <p><label for="passwd">Mot de passe</label><input type="password" name="passwd" id="passwd" />
            <input type="submit" value="Me connecter"/>
    </form>
    <?php
    if(isset($_GET["wrong_password"])){
        echo '<p style="color: red">Le mot de passe est incorrect</p>';
    }
    if(isset($_GET["wrong_user"])){
        echo '<p style="color: red">Cet utilisateur n\'existe pas</p>';
    }
    ?>

</main>

<?php include "includes/footer.php"?>
<script src="assets/js/crop.js"></script>

</body>
</html>