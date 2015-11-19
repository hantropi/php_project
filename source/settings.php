<?php
if (isset($_SESSION["error_change"])) {
    echo "<b>Erreur : Champ et/ou valeur errone(s)</b><br>";
    unset($_SESSION["error_change"]);
}
if (!empty($_GET["change"])) {
    require "settings/change_settings.html";
}
if (!empty($_POST["change_value"])) {
    require "settings/change_settings.php";
}
require "settings/display_settings.php";
?>
