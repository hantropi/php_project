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
      <li><a href="user.php?news=true">Fil d'actualite</a></li>
      <li><a href="user.php?friends=true">Gerer ses amis</a></li>
      <li><a href="user.php?posts=true">Messages</a></li>
      <li><a href="user.php?settings=true">Parametres</a></li>
      <li><a href="user.php?signout=true">Deconnexion</a></li>
    </ul>
    <?php
    if (isset($_GET["news"])) { //Affichage des actualite vis a vis de l'utilisateur
	require "news.php";
    }
    if (isset($_GET["friends"]) or isset($_GET["friend_name"])) { //Recherche d'un ami et affichage de l'ensemble de ses amis
	require "search.html";
	if (isset($_GET["friend_name"]))
	    require "search.php";
	require "friends.php";
    }
    if (isset($_GET["posts"])) { //Ecriture d'un message
	require "posts.html";
	if (isset($_POST["title"]) and isset($_POST["content"]))
	    require "posts.php";
    }
    if (isset($_GET["settings"]) or isset($_GET["change"]) or isset($_POST["change_value"])) { //Affichage et modifications des parametres de l'utilisateur
	if (!empty($_GET["change"])) {
	    $change = htmlspecialchars($_GET["change"]);
	    require "change.html";
	}
	if (!empty($_POST["change_value"])) {
	    $value = htmlspecialchars($_POST["change_value"]);
	    require "change.php";
	}
	if (isset($_GET["settings_error"]))
	    echo "<b>Erreur : Champ et/ou valeur errone(s)</b><br>";
	require "settings.php";
    }
    if (isset($_GET["signout"])) { //Deconnexion de la session
	unset($_SESSION["id"]);
	header("Location: home.php");
	exit;
    }
    ?>
  </body>
</html>
