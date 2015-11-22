<?php
session_start();
include_once "library.php";

$db = connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_user_login($_SESSION["id"], $db); ?> - Settings Hub</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php //Affiche les parametres de l'utilisateur et permet de les changer
    require "menu.html";
    echo "<section>";
    echo "<h2>Parametres</h2>";
    if (isset($_SESSION["error_change"])) {
	echo "<p id='error'>Erreur : Champ et/ou valeur errone(s)</p>";
	unset($_SESSION["error_change"]);
    }
    if (!empty($_GET["change"])) {
	require "settings/change_settings.html";
    }
    if (!empty($_POST["change_value"])) {
	require "settings/change_settings.php";
    }
    require "settings/display_settings.php";
    echo "</section>";
    ?>
  </body>
</html>
