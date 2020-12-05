<?php
require_once ("./model/Manager/BddAuth.php");
require_once ("./model/Manager/BddConnect.php");
require ("./model/Manager/ArticleManager.php");
require ("./model/Entity/ArticleEntity.php");
require ("./model/Manager/UserManager.php");
require ("./model/Entity/UserEntity.php");
use \Model\Manager\ArticleManager;
use \Model\Manager\UserManager;
use \Model\Entity\ArticleEntity;
use \Model\Entity\UserEntity;

$uri = $_SERVER["REQUEST_URI"];
include_once "view/includes/header.php";
switch ($uri) {
    case "/":
        require 'view/home.php';
        break;
    case "/about":
        require 'view/about.php';
        break;
    case "/blog":

        require 'view/blog.php';
        break;
    case "/contact":
        require 'view/contact.php';
        break;
    case "/create_account":
        require 'view/create_account.php';
        break;
    case "/login":
        require 'view/login.php';
        break;
    case "/mentions":
        require 'view/mentions.php';
        break;
    case "/search_blog":
        require 'view/search_blog.php';
        break;
    case "/user_infos":
        require 'view/user_infos.php';
        break;
    default:
        echo "<h1>Erreur 404 Cette page n'existe pas</h1>";
}
include "view/includes/footer.php" ;