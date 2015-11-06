<?php
session_start();
include_once("library.php");

$db = connexion();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Posts Hub</title>
    <meta charset="utf-8"/>
  </head>
  <body>
  </body>
</html>
