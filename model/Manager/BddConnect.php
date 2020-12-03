<?php
namespace Model\Manager;

class BddConnect
{
    protected $pdo;

    public function __construct(){
        $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
        $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        try {
            $auth = new BddAuth();
            return $pdo = new PDO($auth::DSN, $auth::USER, $auth::PASS, $pdo_options);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}