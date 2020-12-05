<?php
require_once ("../model/Manager/BddAuth.php");
require_once ("../model/Manager/BddConnect.php");
require ("../model/Manager/ArticleManager.php");
require ("../model/Entity/ArticleEntity.php");
use \Model\Manager\ArticleManager;
use \Model\Entity\ArticleEntity;

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
?>
</body>
</html>

