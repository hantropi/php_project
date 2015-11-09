<?php
session_start();
include_once("library.php");

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Friends Hub</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php require "menu.php" ?>
    
    <h2>Amis</h2>
    <!-- Creer un tableau en HTML qui affiche chaque amis avec des options, comme envoyer un message, supprimer, etc. -->
    <form action="friends.php" method="get">
      <label for="search_friend">Rechercher un ami :</label> <input type="text" id="search_friend" name="friend_name">
      <input type="submit" value="Rechercher">
    </form>
    <?php
    if (isset($_GET["friend_name"])) { //Recherche un ami
	$friend_name = htmlspecialchars($_GET["friend_name"]);
	search_friend($friend_name, $db);
    }
    ?>
    <?php //Affiche les amis de l'utilisateur
    display_user_friends($_SESSION["id"], $db);
    ?>
  </body>
</html>
