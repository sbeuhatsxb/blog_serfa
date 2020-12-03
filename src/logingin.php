<?php
require_once ("bddConnect.php");
$queryUserEmail = 'SELECT user_mail, user_pwd FROM users';

$email = $_POST["mail"];
$password = $_POST["passwd"];

$queryEmail = " WHERE user_mail = :email";
$queryUserEmail .= $queryEmail;
$queryUserEmailPrep = pdo()->prepare($queryUserEmail);
$queryUserEmailPrep->bindValue(':email', $email, PDO::PARAM_INT);

try {
    $queryUserEmailPrep->execute();
    $results = $queryUserEmailPrep->fetch();
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

if ($results) {
    //Comparation du mot de passe en clair de $_POST contre le hash enregistré en base
    if (password_verify($password, $results["user_pwd"]) || $password == $results["user_pwd"]) {
        session_start();
        $_SESSION['user'] = $email;
        $_SESSION['start'] = time();
        header("Location: /blog_serfa/index.php");
        exit();
    } else {
        //Mauvais mot de passe
        header("Location: ../view/login.php?wrong_password=1");
        exit();
    }

} else {
    header("Location: ../view/login.php?wrong_user=1");
}

