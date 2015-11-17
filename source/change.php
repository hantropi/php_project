<?php
$change = htmlspecialchars($_GET["change"]);
$value = htmlspecialchars($_POST["change_value"]);
if (!check_value($change, $value, $db)) {
    update_settings($change, $value, $_SESSION["id"], $db);
}
header("Location: user.php?settings=true");
?>
