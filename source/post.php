<?php
session_start();
include_once "library.php";

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Post Hub</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php //Permet d'envoyer un message aux autres utilisateurs
    require "menu.html";
    if (isset($_SESSION["error_post"])) {
	echo "<b>Titre et/ou contenu du message vide ou probleme lors de l'envoie.</b><br>";
	unset($_SESSION["error_post"]);
    }
    require "post/send_post.html";
    if (isset($_POST["title"]) and isset($_POST["content"]))
	require "post/send_post.php";
    ?>
  </body>
</html>
