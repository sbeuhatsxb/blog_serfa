<?php
namespace Model\Manager;
use Model\Manager\BddAuth;
use \PDO;



class UserManager extends BddConnect
{
    /**
     * @param null $limit
     * @return mixed
     */
    public function findAll()
    {
        $queryUsers = 'SELECT user_name FROM users';
        $queryUsersPrep = $this->pdo->prepare($queryUsers);
        return $this->tryQueryAll($queryUsersPrep);
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