<?php
namespace Model\Manager;
use Model\Manager\BddAuth;
use \PDO;

/**
 * Class ArticleManager
 * @package Model\Manager
 */
class ArticleManager extends BddConnect
{
    /**
     * @param null $limit
     * @return mixed
     */
    public function findAll($limit = NULL){

        $queryBlog = 'SELECT article_id, article_img, article_title, article_createdate, CONCAT(user_name, " ", user_firstname) as article_creator, article_content FROM articles INNER JOIN users ON articles.article_creator = users.user_id ORDER BY articles.article_createdate DESC';
        $queryBlogPrep = $this->pdo->prepare($queryBlog);
        if($limit){
            $limit = " LIMIT :limit;";
            $queryBlog .= $limit;
        }
        $queryBlogPrep->bindValue(':limit', 4, PDO::PARAM_INT);
        return $this->tryQueryAll($queryBlogPrep);
    }

    /**
     * @param $query
     * @return mixed
     */
    function tryQueryAll($query){
        try {
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }

    /**
     * @param $query
     * @return mixed
     */
    function tryQuery($query)
    {
        try {
            $query->execute();
            return $query->fetch();
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }
}