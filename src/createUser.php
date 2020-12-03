<?php
require_once ("bddConnect.php");
$createUser = "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd, hashed) VALUES (:name, :firstname, :email, :password, :hash)";

$name = $_POST["name"];
$firstname = $_POST["firstname"];
$email = $_POST["mail"];
$password = $_POST["passwd"];
$confPassword = $_POST["confirmPwd"];

$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

$data = [
    'name' => $name,
    'firstname' => $firstname,
    'email' => $email,
    'password' => $hash,
    'hash' => 1
];



try {
    pdo()->prepare($createUser)->execute($data);
    header("Location: /blog_serfa/index.php?user_created=" . $name);
} catch (PDOException $e) {
    print_r("Il y a eu un problème lors de l'enregistrement. Erreur " . pdo()->errorCode() . " | ");
}






