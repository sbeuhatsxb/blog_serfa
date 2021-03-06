<?php
if (!isset($_GET["disconnected"])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Essentiel pour le responsive -->
    <?php
    switch ($uri) {
        CASE "/":
            $title = "Accueil";
            break;
        CASE "/about":
            $title = "A propos";
            break;
        CASE "/blog":
            $title = "Blog";
            break;
        CASE "/contact":
            $title = "Contact";
            break;

    }
    if (isset($_SESSION["userInfos"])) {
        $userConnected = $_SESSION["userInfos"];
        echo '<p style="color: green; text-align: right;">Bienvenue : ' . $userConnected . '</p>';
    }
    echo "<title>BLOG - $uri</title>";
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png" />
</head>
<body>
<header >
    <img id="logo" alt="logo" src="assets/images/logo.png">
    <h1>Mon BLOG</h1>
    <div id="user">

        <?php
        if(!isset($_SESSION["user"])){
            echo '<a href="/login" title="Se connecter"><i class="fas fa-sign-in-alt"></i></a>
                |
                <a href="/create_account" title="Créer un compte"><i class="fas fa-user-plus"></i></a>
            ';
        } else {
            echo '<a href="src/disconnectUser.php" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a>|';

            echo '<a href="/user_infos" title="Voir mon profil"><i class="fas fa-user"></i></a>';

        }
        ?>
    </div>
    <nav>
        <img alt="burger_menu" src="/assets/images/burger.png" title="menu" />
        <ul>
            <?php
            $menu = array(
                array("/", "Page d'accueil", "Accueil"),
                array("/about", "A propos", "A propos"),
                array("/blog", "Blog", "Blog"),
                array("/contact", "Contact", "Contact")
            );

            foreach ($menu as $menuItem){
                if(strpos($menuItem[0], $uri)){
                    echo '<li class="active"><a href='.$menuItem[0]." title=".$menuItem[1].">".$menuItem[2]."</a></li>";
                } else {
                    echo '<li><a href='.$menuItem[0]." title=".$menuItem[1].">".$menuItem[2]."</a></li>";
                }
            }

            ?>
        </ul>
    </nav>
    <?php
    if (isset($_SESSION["user_created"])) {
    $userCreated = $_SESSION["user_created"];
    echo '<p style="color: green">Utilisateur créé : ' . $userCreated . '</p>';
    $_SESSION["user_created"] = "";
    } ?>
</header>