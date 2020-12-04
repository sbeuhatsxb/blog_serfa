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

    public function showUser($email){
        $queryShowUser = 'SELECT user_mail, user_name, user_firstname, user_pwd FROM users WHERE user_mail = :email';

        $queryShowUserPrep = $this->pdo->prepare($queryShowUser);
        $queryShowUserPrep->bindValue(':email', $email, PDO::PARAM_STR);
        return $this->tryQuery($queryShowUserPrep);
    }

    public function getUserPassword($email){
        $queryGetUserPwd = 'SELECT user_pwd, hashed FROM users WHERE user_mail = :email';
        $queryGetUserPwdPrep = $this->pdo->prepare($queryGetUserPwd);
        $queryGetUserPwdPrep->bindValue(':email', $email, PDO::PARAM_STR);
        return $this->tryQuery($queryGetUserPwdPrep);
    }

    public function updateUserInfosAjax($input, $field, $email){
        $updateUser = "UPDATE users SET $field = ? WHERE user_mail = '$email'";
        try {
            $this->pdo->prepare($updateUser)->execute([$input]);
            echo "Information mise à jour";
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }

    //If not already hashed --> hash
    public function updatePasswordHash($email, $hash, $form = false){
        $updateUser = "UPDATE users SET user_pwd = ?, hashed = ? WHERE user_mail = '$email'";

        if(!$form){
            try {
                $this->pdo->prepare($updateUser)->execute([$hash, 1]);
                echo "Le mot de passe est haché";
            } catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        } else {
            try {
                $this->pdo->prepare($updateUser)->execute([$hash, 1]);
                header("Location: /blog_serfa/view/user_infos.php?password=1");
                exit();
            } catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        }
    }

    public function updatePassword($hash){
        $updateUser = "UPDATE users SET user_pwd = ?, hashed = ? WHERE user_mail = '$email'";

        try {
            $this->pdo->prepare($updateUser)->execute([$input]);
            echo "Information mise à jour";
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }


    public function createUser($name, $firstname, $email, $hash){
        $createUser = "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd, hashed) VALUES (:name, :firstname, :email, :password, :hash)";

        $data = [
            'name' => $name,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $hash,
            'hash' => 1
        ];

        try {
            $this->pdo->prepare($createUser)->execute($data);
            session_start();
            $_SESSION['user'] = $name;
            $_SESSION['start'] = time();
            header("Location: /blog_serfa/index.php?user_created=" . $name);
        } catch (PDOException $e) {
            print_r("Il y a eu un problème lors de l'enregistrement" . $e->getMessage);
        }
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