<?php
include_once "includes/header.php";
require ("../src/user_info_display.php");

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
    
    <form action="/blog_serfa/src/update_user.php" name="formUpdate" method="post" id="formHidden">
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

include "includes/footer.php" ?>
<script src="../assets/js/modifyUserInfos.js"></script>
</body>
</html>