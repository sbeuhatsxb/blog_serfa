<?php
use \Model\Manager\UserManager;
use \Model\Entity\UserEntity;


if (isset($_SESSION["modified_password"])) {
    if ($_SESSION["modified_password"]) {
        echo '<p style="color: green">Le mot de passe a été modifié</p>';
    } else {
        echo '<p style="color: red">Les mots de passe ne correspondent pas</p>';
    }
    $_SESSION["hashed"] = "";
}

if (isset($_SESSION["hashed"])) {
    if ($_SESSION["hashed"]) {
        echo '<p style="color: green">Le mot de passe est haché</p>';
    } else {
        echo '<p style="color: red">Le mot de passe est déjà haché</p>';
    }
    $_SESSION["hashed"] = "";
}

if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"];
    $userManager = new UserManager();
    $results = $userManager->showUser($email);
    $user = new UserEntity();
    $user->hydrate($results);
}


if(isset($results)){
    echo '
<main>
    <section>
    <p id="result" style="color: green"></p>
        <table>
            <tbody>
                <tr>
                    <th>Email (ne peut être changé)</th>
                    <td>&nbsp;' . $email . '&nbsp;</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><button id="user_name" onclick="reply_click(this.id)">&nbsp;' . $user->getName() . '&nbsp;</button></td>
                </tr>
                <tr>
                    <th>Prenom</th>
                    <td><button id="user_firstname" onclick="reply_click(this.id)">&nbsp;' . $user->getFirstname() . '&nbsp;</button></td>
                </tr>
                <tr>
                    <th>Hacher le mot de passe</th>
                    <td><button id="hash" onclick="reply_click(this.id)">&nbsp;Hacher&nbsp;</button></td>
                </tr>
                <tr>
                    <th>Mot de passe</th>
                    <td><button id="pwd" onclick="reply_click(this.id)">&nbsp;Modifier&nbsp;</button></td>
                </tr>
            </tbody>
        </table>
    </section>
    
    <form action="src/update_user.php" name="formUpdate" method="post" id="formHidden">
        <p>
            <label for="passwd">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" />
        </p>
        <p>
            <label for="passwd">Confirmation</label>
            <input type="password" name="confirmPassword" id="confirmPassword" />
        </p>
        <p>
            <input type="submit" value="Modifier le mot de passe" id="pwdSbumited"/>
        </p>
    </form>
</main>
    ';
} else {
    echo '<p>Veuillez vous connecter</p>';
}
?>
<script src="/assets/js/modifyUserInfos.js"></script>
</body>
</html>