<?php
session_start();
include_once("library.php");

$db = connexion();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Friends Hub</title>
    <meta charset="utf-8"/>
  </head>
  <body>
    <!-- Creer un tableau en HTML qui affiche chaque amis avec des options, comme envoyer un message, supprimer, etc. -->
    <h1>Amis</h1>
    <?php //Affiche les amis de l'utilisateur
    display_user_friends($_SESSION["id"], $db);
    ?>
  </body>
</html>
