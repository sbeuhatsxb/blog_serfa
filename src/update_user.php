<?php
session_start();
include "sql_queries.php";

if (isset($_POST["hash"]) && $_POST["hash"] == 1) {

    $email = $_SESSION["user"];
    $queryGetUserPwdPrep = $pdo->prepare($queryGetUserPwd);
    $queryGetUserPwdPrep->bindValue(':email', $email, PDO::PARAM_STR);
    $queryGetUserPwdPrep->execute();
    $results = $queryGetUserPwdPrep->fetch();

    if (isset($results)){
        //Si le mot de passe n'est pas hashé
        if($results["hashed"] == 0){
            //On enregistre le
            $recordedPassword = $results["user_pwd"];

            $hash = password_hash($recordedPassword, PASSWORD_DEFAULT, ['cost' => 10]);
            $updateUser = "UPDATE users SET user_pwd = ?, hashed = ? WHERE user_mail = '$email'";
            $pdo->prepare($updateUser)->execute([$hash, 1]);
            echo "Le mot de passe est haché";
        } else {
            echo "Le mot de passe est déjà haché";
        }
    }
}

if (isset($_SESSION["user"]) && !isset($_POST["password"]) && !isset($_POST["hash"])) {
    $value = $_POST["value"];
    $field = $_POST["id"];
    $email = $_SESSION["user"];

    $updateUser = "UPDATE users SET $field = ? WHERE user_mail = '$email'";

    $pdo->prepare($updateUser)->execute([$value]);
    echo "Information mise à jour";
} elseif (isset($_POST["password"]) && isset($_SESSION["user"])) {

    //Comparaison des deux mots de passes saisis
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_SESSION["user"];

    if ($password == $confirmPassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        $updateUser = "UPDATE users SET user_pwd = ?, hashed = ? WHERE user_mail = '$email'";
        $pdo->prepare($updateUser)->execute([$hash, 1]);
        header("Location: ../user_infos.php?password=1");
        exit();
    } else {
        header("Location: ../user_infos.php?password=0");
        exit();
    }

} else {
    exit();
}

