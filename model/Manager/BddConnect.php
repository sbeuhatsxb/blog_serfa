<?php
namespace Model\Manager;
use \PDO;

class BddConnect
{
    protected $pdo;


    public function __construct(){

        $auth = new BddAuth();
        $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
        $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        try {
            return $this->pdo = new PDO($auth::DSN, $auth::USER, $auth::PASS, $pdo_options);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}