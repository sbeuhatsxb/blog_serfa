<?php
function getQueryBlog($limit = false){
    $queryBlog = 'SELECT article_img, article_title, article_createdate, CONCAT(user_name, " ", user_firstname) as user_creator, article_content FROM articles INNER JOIN users ON articles.article_creator = users.user_id ORDER BY articles.article_createdate DESC';
    if($limit){
        $limit = " LIMIT :limit;";
        $queryBlog .= $limit;
    }
    $queryBlogPrep = pdo()->prepare($queryBlog);
    $queryBlogPrep->bindValue(':limit', 4, PDO::PARAM_INT);
    return tryQueryAll($queryBlogPrep);
}

function getQueryAllUser(){
    $queryUsers = 'SELECT user_name FROM users';
    $queryUsersPrep = pdo()->prepare($queryUsers);
    return tryQueryAll($queryUsersPrep);
}

function searchInBlog(){
    return $querySearchInBlog = 'SELECT * FROM articles 
    INNER JOIN users ON articles.article_creator = users.user_id
     WHERE users.user_name = :author
     AND article_content LIKE :content
    ';

}




function tryQueryAll($query){
    try {
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
}

function tryQuery($query){
    try {
        $query->execute();
        return $query->fetch();
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
}