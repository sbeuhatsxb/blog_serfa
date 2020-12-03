<?php
include_once "includes/header.php";
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/ArticleManager.php");
require ("../model/Entity/ArticleEntity.php");
require ("../model/Manager/UserManager.php");
require ("../model/Entity/UserEntity.php");
use \Model\Manager\ArticleManager;
use \Model\Manager\UserManager;
use \Model\Entity\ArticleEntity;
use \Model\Entity\UserEntity;


echo '
<main>
    <h2>Recherche</h2>
    <p>Page affichant les résultats de la recherche</p>';

$articleManager = new ArticleManager();
$results = $articleManager->searchInBlog();
foreach ($results as $result){
    $article = new ArticleEntity();
    $article->hydrate($result);
    include "includes/blogDisplay.php";
}
echo '</main>';
include "includes/footer.php" ?>
</body>
</html>

