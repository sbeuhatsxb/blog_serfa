<?php
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/UserManager.php");
require ("../model/Entity/UserEntity.php");
use \Model\Manager\UserManager;
use \Model\Entity\UserEntity;

$userManager = new UserManager();

$name = $_POST["name"];
$firstname = $_POST["firstname"];
$email = $_POST["mail"];
$password = $_POST["passwd"];
$confPassword = $_POST["confirmPwd"];
$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

$userManager->createUser($name, $firstname, $email, $hash);
session_start();
$_SESSION['user'] = $email;
$_SESSION['start'] = time();
$_SESSION['userInfos'] = $firstname . " " . $name;


