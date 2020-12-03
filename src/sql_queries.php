<?php
require_once ("bddConnect.php");

function getQueryBlog($limit = false){
    $queryBlog = 'SELECT article_img, article_title, article_createdate, CONCAT(user_name, " ", user_firstname) as user_creator, article_content FROM articles INNER JOIN users ON articles.article_creator = users.user_id ORDER BY articles.article_createdate DESC';
    $queryBlogPrep = pdo()->prepare($queryBlog);
    if($limit){
        $limit = " LIMIT :limit;";
        $queryBlog .= $limit;
    }
    $queryBlogPrep->bindValue(':limit', 4, PDO::PARAM_INT);
    return tryQueryAll($queryBlogPrep);
}

function searchInBlog(){
    $querySearchInBlog = 'SELECT article_img, article_title, article_createdate, CONCAT(user_name, " ", user_firstname) as user_creator, article_content FROM articles 
    INNER JOIN users ON articles.article_creator = users.user_id
     WHERE users.user_name = :author
     AND article_content LIKE :content
    ';

    $content = $_POST["keywords"];
    $author = $_POST["author"];

    //Si la période est sélectionnée
    if ($_POST["period"] == 1) {
        $startdate = $_POST["startdate"];
        $enddate = $_POST["enddate"];

        //Si l'une des des dates est remplie
        if (!empty($startdate) || !empty($enddate)) {
            //On continue la requête SQL
            $querySearchInBlog .= ' OR article_createdate';
            //Si les deux dates sont renseignées
            if (!empty($startdate) && !empty($enddate)) {
                if (new DateTime($startdate) <= new DateTime($enddate)) {
                    $querySearchInBlog .= ' BETWEEN :startdate AND :enddate';
                }
                //Si la date de début est renseignée
            } elseif (!empty($startdate) && empty($enddate)) {
                $querySearchInBlog .= ' >= :startdate';
                //Si la date de fin est renseignée
            } else {
                $querySearchInBlog .= ' <= :$enddate';
            }

            $querySearchInBlogPrep = pdo()->prepare($querySearchInBlog);
            $querySearchInBlogPrep->bindValue(':startdate', $startdate, PDO::PARAM_STR);
            $querySearchInBlogPrep->bindValue(':enddate', $enddate, PDO::PARAM_STR);
        } else {
            //Si aucune date n'est saisie, la date n'est pas prise en compte
            $querySearchInBlogPrep = pdo()->prepare($querySearchInBlog);
        }

        //Si la date seule est sélectionnée
    } else {
        $date = $_POST["date"];
        $querySearchInBlog .= ' OR article_createdate = :date';
        $querySearchInBlogPrep = pdo()->prepare($querySearchInBlog);
        $querySearchInBlogPrep->bindValue(':date', $date, PDO::PARAM_STR);

    }

    $querySearchInBlogPrep->bindValue(':author', $author, PDO::PARAM_STR);
    $querySearchInBlogPrep->bindValue(':content', "%" . $content . "%", PDO::PARAM_STR);
    return tryQueryAll($querySearchInBlogPrep);
}

function logIn(){

}

function getQueryAllUser(){
    $queryUsers = 'SELECT user_name FROM users';
    $queryUsersPrep = pdo()->prepare($queryUsers);
    return tryQueryAll($queryUsersPrep);
}

//function tryQueryAll($query){
//    try {
//        $query->execute();
//        return $query->fetchAll();
//    } catch (PDOException $e) {
//        echo 'Échec lors de la connexion : ' . $e->getMessage();
//    }
//}
//
//function tryQuery($query){
//    try {
//        $query->execute();
//        return $query->fetch();
//    } catch (PDOException $e) {
//        echo 'Échec lors de la connexion : ' . $e->getMessage();
//    }
}