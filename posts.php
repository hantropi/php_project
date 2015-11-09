<?php
session_start();
include_once("library.php");

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Posts Hub</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php require "menu.php" ?>
    
    <h2>Messages</h2>
  </body>
</html>
