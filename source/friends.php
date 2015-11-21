<?php
session_start();
include_once "library.php";

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Friends Hub</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php //Gere la recherche et l'affichage des amis de l'utilisateur
    require "menu.html";
    echo "<section>";
    echo "<h2>Amis</h2>";
    require "friends/search_friend.html";
    if (isset($_POST["friend_name"]))
	require "friends/search_friend.php";
    if (isset($_GET["add_friend"]))
	require "friends/add_friend.php";
    require "friends/display_friends.php";
    echo "</section>";
    ?>
  </body>
</html>
