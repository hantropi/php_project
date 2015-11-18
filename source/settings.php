<?php
if (!empty($_GET["change"])) {
    require "change_settings.html";
}
if (!empty($_POST["change_value"])) {
    require "change_settings.php";
}
if (isset($_GET["error_change"]))
    echo "<b>Erreur : Champ et/ou valeur errone(s)</b><br>";
require "display_settings.php";
?>
