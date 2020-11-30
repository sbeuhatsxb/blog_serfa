<?php
include "sql_queries.php";

$name = $_POST["name"];
$firstname = $_POST["firstname"];
$email = $_POST["mail"];
$password = $_POST["passwd"];
$confPassword = $_POST["confirmPwd"];

$data = [
    'name' => $name,
    'firstname' => $firstname,
    'email' => $email,
    'password' => $password,
];

if($pdo->errorCode() == '00000'){
    $pdo->prepare($createUser)->execute($data);
    header("Location: ../index.php?user_created=".$name);
} else {
    print_r("Il y a eu un problème lors de l'enregistrement. Erreur " . $pdo->errorCode() . " | ");
};





