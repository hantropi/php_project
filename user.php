<?php
session_start();
include_once("library.php");

$db = connexion();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - User Hub</title>
    <meta charset="utf-8"/>
  </head>
  <body>
    <a href="friends.php">Gerer ses amis</a>
    <a href="posts.php">Messages</a>
    
    <h1>Mon profil</h1>
    <?php //Affiche les infos de l'utilisateur
    display_user_infos($_SESSION["id"], $db);
    ?>
    
    <h1>Fil d'actualite</h1>
    <?php //Affiche les evenements recents en lien avec l'utilisateur
    //display_news_feed($_SESSION["id"], $db);
    ?>
  </body>
</html>
