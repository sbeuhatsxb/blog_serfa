<?php
require 'bddConnect.php';

$queryBlog = 'SELECT * FROM articles INNER JOIN users ON articles.article_creator = users.user_id ORDER BY articles.article_createdate DESC';

$querySearchInBlog = 'SELECT * FROM articles 
    INNER JOIN users ON articles.article_creator = users.user_id
     WHERE users.user_name = :author
     AND article_content LIKE :content
    ';

$queryUsers = 'SELECT user_name FROM users';

$createUser = "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd) VALUES (:name, :firstname, :email, :password)";

$queryUserEmail = 'SELECT user_mail, user_pwd FROM users';

$queryShowUser = 'SELECT user_name, user_firstname FROM users WHERE user_mail = :email';

$queryGetUserPwd = 'SELECT user_pwd, hashed FROM users WHERE user_mail = :email';