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
      <li><a href="user.php?options=true">Options</a></li>
      <li><a href="user.php?signout=true">Deconnexion</a></li>
    </ul>
    <?php
    if (isset($_GET["news"])) {
	echo "<h2>" . "Fil d'actualite" . "</h2>";
	require "news.php";
    }
    if (isset($_GET["friends"]) or isset($_GET["friend_name"])) {
	require "search.html";
	if (isset($_GET["friend_name"]))
	    require "search.php";
	echo "<h2>" . "Amis" . "</h2>";
	require "friends.php";
    }
    if (isset($_GET["posts"])) {
	echo "<h2>" . "Messages" . "</h2>";
	require "posts.php";
    }
    if (isset($_GET["options"])) {
	echo "<h2>" . "Options" . "</h2>";
	require "options.php";
    }
    if (isset($_GET["signout"])) {
	unset($_SESSION["id"]);
	header("Location: home.php");
	exit;
    }
    ?>
  </body>
</html>
