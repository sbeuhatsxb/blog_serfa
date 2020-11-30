<?php
include "includes/header.php";
include "includes/sql_queries.php";

if(isset($_SESSION["user"])){
    $email = $_SESSION["user"];
    $queryBlogPrep = $pdo->prepare($queryShowUser);
    $queryBlogPrep->bindValue(':email', $email, PDO::PARAM_STR);
    $queryBlogPrep->execute();
    $results = $queryBlogPrep->fetch();

    echo '
<main>
    <table>
        <tbody>
            <tr>
                <th>Nom</th>
                <td><button id="user_name" onclick="reply_click(this.id)">&nbsp;test&nbsp;</button></td>
            </tr>
            <tr>
                <th>Prenom</th>
                <td><button id="user_firstname" onclick="reply_click(this.id)">&nbsp;sbeuh&nbsp;</button></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><button id="user_mail" onclick="reply_click(this.id)">&nbsp;sbeuh@sbeuh.sb&nbsp;</button></td>
            </tr>
            <tr>
                <th>Mot de passe</th>
                <td><button id="user_pwd" onclick="reply_click(this.id)">&nbsp;*********&nbsp;</button></td>
            </tr>
        </tbody>
    </table>
</main>
    ';

    if(isset($_POST["email"])){
        $value = $_POST["value"];
        $field = $_POST["id"];
        $emailS = $_POST["email"];

        $email = str_replace(' ', '', $emailS);

        $updateUser = "UPDATE users SET $field = ? WHERE user_mail = '$email'";

        $pdo->prepare($updateUser)->execute([$value]);
    }

} else {
    echo '<p>Veuillez vous connecter</p>';
}

include "includes/footer.php" ?>
<script src="assets/js/modifyUserInfos.js"></script>
</body>
</html>