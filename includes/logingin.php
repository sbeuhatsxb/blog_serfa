<?php
include "sql_queries.php";

$email = $_POST["mail"];
$password = $_POST["passwd"];

$queryEmail = " WHERE user_mail = :email";
$queryUserEmail .= $queryEmail;
$queryUserEmailPrep = $pdo->prepare($queryUserEmail);
$queryUserEmailPrep->bindValue(':email', $email, PDO::PARAM_INT);
$queryUserEmailPrep->execute();
$results = $queryUserEmailPrep->fetch();

if($results){
 //Le compte existe
    if ($password != $results["user_pwd"]){
        echo "Le mot de passe est erroné";
        header("Location: ../login.php?wrong_password=1");
    } else {
        session_start();
        $_SESSION['user'] = $email;
        $_SESSION['start'] = time();
        header("Location: ../index.php");
        exit();

    }

} else {
    header("Location: ../login.php?wrong_user=1");
}