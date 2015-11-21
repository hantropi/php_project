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
    <link rel="stylesheet" type="text/css" href="news.css">
  </head>
  <body>
    <?php
    require "menu.html";
    require "news.php";
    ?>
  </body>
</html>
