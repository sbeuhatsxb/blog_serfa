<?php
//namespace App;

include "includes/header.php";
include "src/sql_queries.php";

$limit = " LIMIT :limit;";
$queryBlog .= $limit;
$queryBlogPrep = $pdo->prepare($queryBlog);
$queryBlogPrep->bindValue(':limit', 4, PDO::PARAM_INT);
$queryBlogPrep->execute();
$results = $queryBlogPrep->fetchAll();

?>
<main>
    <h2>Accueil</h2>
    <p>Page affichant les 4 derniers articles</p>
    <?php
    include "includes/blogDisplay.php";
    ?>

</main>

<?php include "includes/footer.php" ?>
<script src="assets/js/crop.js"></script>
</body>
</html>