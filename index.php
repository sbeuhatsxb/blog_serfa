<?php
include "includes/header.php";
include "src/sql_queries.php";

$limit = " LIMIT :limit;";
$queryBlog .= $limit;
$queryBlogPrep = $pdo->prepare($queryBlog);
$queryBlogPrep->bindValue(':limit', 4, PDO::PARAM_INT);
$queryBlogPrep->execute();
$results = $queryBlogPrep->fetchAll();

if (isset($_SESSION["user"])) {
    $userConnected = $_SESSION["user"];
    echo '<p>Bienvenue : ' . $userConnected . '</p>';
}
if (isset($_GET["user_created"])) {
    $userCreated = $_GET["user_created"];
    echo '<p>Utilisateur créé : ' . $userCreated . '</p>';
}

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