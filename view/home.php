<?php
use \Model\Manager\ArticleManager;
use \Model\Entity\ArticleEntity;
?>
<main>
    <h2>Accueil</h2>
    <p>Page affichant les 4 derniers articles</p>
    <?php
    $articleManager = new ArticleManager();
    $results = $articleManager->findAll(4);

    foreach ($results as $result){
        $article = new ArticleEntity();
        $article->hydrate($result);
        include "includes/blogDisplay.php";
    }
    ?>
</main>

<script src="/assets/js/crop.js"></script>
</body>
</html>