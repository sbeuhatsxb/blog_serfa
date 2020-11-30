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

    //Retrait du flag de la comparaison des hashes
    $truePassword = trim($results["user_pwd"],"**hashed**|");

    $hash = password_hash($truePassword, PASSWORD_DEFAULT, ['cost' => 15]);
    if (password_verify($password, $results["user_pwd"]) || $password == $results["user_pwd"]){
        session_start();
        $_SESSION['user'] = $email;
        $_SESSION['start'] = time();
        header("Location: ../index.php");
        exit();
    } else {
        //Mauvais mot de passe
        header("Location: ../login.php?wrong_password=1");
        exit();
    }

} else {
    header("Location: ../login.php?wrong_user=1");
}