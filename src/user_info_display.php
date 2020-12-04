<?php
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/UserManager.php");
require ("../model/Entity/UserEntity.php");
use \Model\Manager\UserManager;
use \Model\Entity\UserEntity;


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

if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"];
    $userManager = new UserManager();
    $results = $userManager->showUser($email);
    $user = new UserEntity();
    $user->hydrate($results);
}
