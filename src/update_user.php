<?php
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/UserManager.php");
require ("../model/Entity/UserEntity.php");
use \Model\Manager\UserManager;
use \Model\Entity\UserEntity;
session_start();


//AJAX
//HACHAGE MOT DE PASSE
if (isset($_POST["hash"]) && $_POST["hash"] == 1) {
    $userManager = new UserManager();
    $results = $userManager->getUserPassword($_SESSION["user"]);
    if (isset($results)){
        //Si le mot de passe n'est pas hashé
        if($results["hashed"] == 0){
            //On enregistre le mot de passe
            $recordedPassword = $results["user_pwd"];
            $hash = password_hash($recordedPassword, PASSWORD_DEFAULT, ['cost' => 10]);
            $userManager->updatePasswordHash($email, $hash);
        } else {
            echo "Le mot de passe est déjà haché";
        }
    }
}

//MISE A JOUR DES INFORMATIONS EN BDD A LA VOLEE
if (isset($_SESSION["user"]) && !isset($_POST["password"]) && !isset($_POST["hash"])) {
    $input = $_POST["value"];
    $field = $_POST["id"];
    $email = $_SESSION["user"];
    if(isset($userManager)?: $userManager = new UserManager());
    $userManager->updateUserInfosAjax($input, $field, $email);
} elseif (isset($_POST["password"]) && isset($_SESSION["user"])) {
    //Comparaison des deux mots de passes saisis
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_SESSION["user"];


    if ($password == $confirmPassword) {
        if(isset($userManager)?: $userManager = new UserManager());
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        $userManager->updatePasswordHash($email, $hash, true);

    } else {
        header("Location: /blog_serfa/view/user_infos.php?password=0");
        exit();
    }

} else {
    exit();
}