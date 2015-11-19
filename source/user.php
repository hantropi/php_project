<?php
session_start();
include_once "library.php";

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - User Hub</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <ul>
      <li><a href="user.php">Fil d'actualite</a></li>
      <li><a href="user.php?friends=true">Gerer ses amis</a></li>
      <li><a href="user.php?post=true">Messages</a></li>
      <li><a href="user.php?settings=true">Parametres</a></li>
      <li><a href="user.php?signout=true">Deconnexion</a></li>
    </ul>
    <?php
    if (isset($_GET["friends"])) { //Recherche d'une personne et affichage de l'ensemble de ses amis
	require "friends.php";
    }
    else if (isset($_GET["post"])) { //Ecriture d'un message
	require "post.php";
    }
    else if (isset($_GET["settings"]) or isset($_GET["change"])) { //Affichage et modifications des parametres de l'utilisateur
	require "settings.php";
    }
    else if (isset($_GET["signout"])) { //Deconnexion de la session
	session_destroy();
	header("Location: home.php");
	exit;
    }
    else //Affichage des actualites de l'utilisateur
	require "news.php";
    ?>
  </body>
</html>
