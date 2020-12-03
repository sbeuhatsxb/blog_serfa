<?php
include_once ("includes/header.php");
use \Model\Manager\ArticleManager;
require ("model/Manager/ArticleManager.php");

?>
<main>
    <h2>Accueil</h2>
    <p>Page affichant les 4 derniers articles</p>
    <?php
//    $results = getQueryBlog(4);
    $results = new ArticleManager();
    $results->findAll(4);
var_dump($results);
    include "includes/blogDisplay.php";
    ?>

</main>

<?php include "includes/footer.php" ?>
<script src="/blog_serfa/assets/js/crop.js"></script>
</body>
</html>