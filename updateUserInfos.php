<?php
include "includes/sql_queries.php";

$value = $_POST["value"];
$field = $_POST["id"];
$emailS = $_POST["email"];

$email = str_replace(' ', '', $emailS);

$updateUser = "UPDATE users SET $field = ? WHERE user_mail = '$email'";

$pdo->prepare($updateUser)->execute([$value]);
