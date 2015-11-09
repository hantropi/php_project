<?php
include_once("library.php");

$db = connexion();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Options Hub</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <?php require "menu.php" ?>
    
    <h2>Mon profil</h2>
    <?php //Affiche les infos de l'utilisateur
    $info = display_user_infos($_SESSION["id"], $db);
    echo "Login : " . $info["login"] . "<br>";
    echo "Prenom : " . $info["first_name"] . "<br>";
    echo "Nom : " . $info["last_name"] . "<br>";
    echo "Age : " . $info["age"] . "<br>";
    echo "Pays : " . $info["country"] . "<br>";
    echo "Email : " . $info["email"] . "<br>";
    ?>
  </body>
</html>
