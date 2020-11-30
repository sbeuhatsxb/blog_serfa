<?php
include "includes/header.php";
include "src/sql_queries.php";

$content = $_POST["keywords"];
$author = $_POST["author"];

//Si la période est sélectionnée
if($_POST["period"] == 1){
    $startdate = $_POST["startdate"];
    $enddate = $_POST["enddate"];

    //Si l'une des des dates est remplie
    if(!empty($startdate) || !empty($enddate)){
        //On continue la requête SQL
        $querySearchInBlog.= ' AND article_createdate';
        //Si les deux dates sont renseignées
        if(!empty($startdate) && !empty($enddate)){
            if(new DateTime($startdate) <=  new DateTime($enddate)){
                $querySearchInBlog.= ' BETWEEN :startdate AND :enddate';
            }
        //Si la date de début est renseignée
        } elseif (!empty($startdate) && empty($enddate)){
            $querySearchInBlog.= ' >= :startdate';
        //Si la date de fin est renseignée
        } else {
            $querySearchInBlog .= ' <= :$enddate';
        }

        $querySearchInBlogPrep = $pdo->prepare($querySearchInBlog);
        $querySearchInBlogPrep->bindValue(':startdate', $startdate, PDO::PARAM_STR);
        $querySearchInBlogPrep->bindValue(':enddate', $enddate, PDO::PARAM_STR);
    } else {
        //Si aucune date n'est saisie, la date n'est pas prise en compte
        $querySearchInBlogPrep = $pdo->prepare($querySearchInBlog);
    }

    //Si la date seule est sélectionnée
} else {
    $date = $_POST["date"];
    $querySearchInBlog.= ' AND article_createdate = :date';
    $querySearchInBlogPrep = $pdo->prepare($querySearchInBlog);
    $querySearchInBlogPrep->bindValue(':date', $date, PDO::PARAM_STR);

}

$querySearchInBlogPrep->bindValue(':author', $author, PDO::PARAM_STR);
$querySearchInBlogPrep->bindValue(':content', "%".$content."%", PDO::PARAM_STR);
$querySearchInBlogPrep->execute();
$results = $querySearchInBlogPrep->fetchAll();

echo '
<main>
    <h2>Recherche</h2>
    <p>Page affichant les résultats de la recherche</p>';
    include "includes/blogDisplay.php";
echo '</main>';
include "includes/footer.php" ?>
</body>
</html>

