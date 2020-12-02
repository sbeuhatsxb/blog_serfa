<?php
include "includes/header.php";
?>
<main>
    <h2>Accueil</h2>
    <p>Page affichant les 4 derniers articles</p>
    <?php
    $results = getQueryBlog(4);
    include "includes/blogDisplay.php";
    ?>

</main>

<?php include "includes/footer.php" ?>
<script src="../assets/js/crop.js"></script>
</body>
</html>