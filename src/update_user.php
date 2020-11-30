<?php
include "../includes/header.php";
include "sql_queries.php";

if(isset($_POST["email"]) && !isset($_POST["password"])) {
    $value = $_POST["value"];
    $field = $_POST["id"];
    $emailS = $_POST["email"];

    $email = str_replace(' ', '', $emailS);

    $updateUser = "UPDATE users SET $field = ? WHERE user_mail = '$email'";

    $pdo->prepare($updateUser)->execute([$value]);
} elseif(isset($_POST["password"]) && isset($_SESSION["user"])) {

    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_SESSION["user"];

    if ($password == $confirmPassword){
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        $updateUser = "UPDATE users SET user_pwd = ? WHERE user_mail = '$email'";
        $pdo->prepare($updateUser)->execute([$hash]);
    }
    header("Location: ../user_infos.php?password=1");
} else {
    exit();
}