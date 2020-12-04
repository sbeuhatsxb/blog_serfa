<?php
require_once("../src/bddConnect.php");

if (isset($_GET["password"])) {
    if ($_GET["password"] == 1) {
        echo '<p style="color: green">Le mot de passe a été modifié</p>';
    } else {
        echo '<p style="color: red">Les mots de passe ne correspondent pas</p>';
    }
}

if (isset($_GET["hashed"])) {
    if ($_GET["hashed"] == 1) {
        echo '<p style="color: green">Le mot de passe est haché</p>';
    } else {
        echo '<p style="color: red">Le mot de passe est déjà haché</p>';
    }
}

$queryShowUser = 'SELECT user_name, user_firstname FROM users WHERE user_mail = :email';
if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"];
    $queryBlogPrep = pdo()->prepare($queryShowUser);
    $queryBlogPrep->bindValue(':email', $email, PDO::PARAM_STR);
    try {
        $queryBlogPrep->execute();
        $results = $queryBlogPrep->fetch();
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
}