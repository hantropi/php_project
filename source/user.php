<?php
session_start();
include_once "library.php";

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - User Hub</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php require "menu.html" ?>
    
    <h2>Fil d'actualite</h2>
    <?php //Affiche les evenements recents en lien avec l'utilisateur
    //display_news_feed($_SESSION["id"], $db);
    ?>
  </body>
</html>
