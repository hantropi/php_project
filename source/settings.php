<?php
if (!empty($_GET["change"])) {
    require "settings/change_settings.html";
}
if (!empty($_POST["change_value"])) {
    require "settings/change_settings.php";
}
if (isset($_GET["error_change"]))
    echo "<b>Erreur : Champ et/ou valeur errone(s)</b><br>";
require "settings/display_settings.php";
?>
