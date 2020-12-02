<?php
include "includes/header.php";
require_once("src/search_in_blog.php");

echo '
<main>
    <h2>Recherche</h2>
    <p>Page affichant les résultats de la recherche</p>';
include "includes/blogDisplay.php";
echo '</main>';
include "includes/footer.php" ?>
</body>
</html>

