<?php
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/UserManager.php");
require ("../model/Entity/UserEntity.php");
use \Model\Manager\UserManager;
use \Model\Entity\UserEntity;

$email = $_POST["mail"];
$password = $_POST["passwd"];

$userManager = new UserManager();
$userResults = $userManager->showUser($email);
$user = new UserEntity();
$user->hydrate($userResults);

if (isset($user) && !is_null($user)) {
    //Comparation du mot de passe en clair de $_POST contre le hash enregistré en base
    if (password_verify($password, $user->getPassword()) || $password == $user->getPassword()) {
        session_start();
        $_SESSION['user'] = $user->getMail();
        $_SESSION['start'] = time();
        $_SESSION['userInfos'] = $user->getFirstname() . " " . $user->getName();
        header("Location: /");
        exit();
    } else {
        //Mauvais mot de passe
        header("Location: /login.php?wrong_password=1");
        exit();
    }

} else {
    header("Location: /login.php?wrong_user=1");
}

