<?php

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
      <li><a href="index.php?news=true">Fil d'actualite</a></li>
      <li><a href="index.php?friends=true">Gerer ses amis</a></li>
      <li><a href="index.php?posts=true">Messages</a></li>
      <li><a href="index.php?options=true">Options</a></li>
      <li><a href="index.php?signout=true">Deconnexion</a></li>
    </ul>
    <?php
    if (isset($_GET["news"])) {
	require "news.php";
    }
    if (isset($_GET["friends"])) {
	require "friends.php";
    }
    if (isset($_GET["posts"])) {
	require "posts.php";
    }
    if (isset($_GET["options"])) {
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
