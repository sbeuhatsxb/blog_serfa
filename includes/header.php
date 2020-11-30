<?php
session_start();
$currentFile = basename($_SERVER['REQUEST_URI']);

if($currentFile == "blog_serfa"){
    $currentFile = "index.php";
} ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Essentiel pour le responsive -->
    <?php
    $title = "";
    switch ($currentFile) {
        CASE "index.php":
            $title = "Accueil";
            break;
        CASE "about.php":
            $title = "A propos";
            break;
        CASE "blog.php":
            $title = "Blog";
            break;
        CASE "contact.php":
            $title = "Contact";
            break;

    }
    echo "<title>BLOG - $title</title>";
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="icon" type="image/png" href="images/logo.png" />
</head>
<body>
<header >
    <img id="logo" alt="logo" src="images/logo.png">
    <h1>Mon BLOG</h1>
    <div id="user">

        <?php
        if(!isset($_SESSION["user"])){
            echo '<a href="login.php" title="Se connecter"><i class="fas fa-sign-in-alt"></i></a>
                |
                <a href="create_account.php" title="Créer un compte"><i class="fas fa-user"></i></a>
            ';
        } else {
            echo '<a href="includes/disconnectUser.php" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a>|';

            echo '<a href="user_infos.php" title="Voir mon profil"><i class="fas fa-user"></i></a>';
        }
        ?>


    </div>
    <nav>
        <img alt="burger_menu" src="images/burger.png" title="menu" />
        <ul>
            <?php
            $menu = array(
                array("index.php", "Page d'accueil", "Accueil"),
                array("about.php", "A propos", "A propos"),
                array("blog.php", "Blog", "Blog"),
                array("contact.php", "Contact", "Contact")
            );


            foreach ($menu as $menuItem){
                if($currentFile == $menuItem[0]){
                    echo '<li class="active"><a href='.$menuItem[0]." title=".$menuItem[1].">".$menuItem[2]."</a></li>";
                } else {
                    echo '<li><a href='.$menuItem[0]." title=".$menuItem[1].">".$menuItem[2]."</a></li>";
                }
            }

            ?>
        </ul>
    </nav>
</header>