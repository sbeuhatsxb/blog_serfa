<?php
include "bddAuth.php";
$pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

try{
    $pdo = new PDO(DSN, USER, PASS, $pdo_options);
} catch(Exception $e){
    print_r($e->getMessage());
}



