<?php
use \Model\Manager\ArticleManager;
use \Model\Manager\UserManager;
use \Model\Entity\ArticleEntity;
use \Model\Entity\UserEntity;
$articleManager = new ArticleManager();
$results = $articleManager->findAll();

?>
<main>
    <h2>Les articles</h2>
    <p>Page affichant tous les articles, avec une zone de recherche sur les articles</p>
    <form name="formSearch" method="post" action="search_blog.php">
        <fieldset>
            <legend>Rechercher des articles</legend>
            <p><label for="keywords">Mots clés</label><input id="keywords" type="text" name="keywords"/></p>
            <p><input type="radio" name="period" checked value="0" onclick="changePeriod()"/> Par date exacte
                <input type="radio" name="period" value="1" onclick="changePeriod()"/> Par période
            </p>
            <p id="uniquedate">
                <label for="date">Date</label><input id="date" type="date" name="date"/>
            </p>
            <p id="period">
                <label for="startdate">Date de début</label><input id="startdate" type="date" name="startdate"/>
                <label for="enddate">Date de fin</label><input id="enddate" type="date" name="enddate"/>
            </p>
            <p>
                <label for="author">Auteur</label>
                <select id="author" name="author">
                    <?php
                    //Récupération de tous les users pour les options du formulaire
                    $userManager = new UserManager();
                    $userResults = $userManager->findAll();
                    foreach ($userResults as $result){
                        $user = new UserEntity();
                        $user->hydrate($result);
                        echo '<option value=' . $user->getName() . '>' . $user->getName() . '</option>';
                    }
                    ?>
                </select>
            </p>
            <p><input type="submit" value="Rechercher"/> <input type="reset" value="Réinitialiser"/>
        </fieldset>
    </form>
    <?php
    foreach ($results as $result){
        $article = new ArticleEntity();
        $article->hydrate($result);
        include "includes/blogDisplay.php";
    }
    ?>
</main>
<script src="assets/js/changePeriod.js"></script>
</body>
</html>