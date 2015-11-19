<?php //Change le champ demande par l'utilisateur en fonction de son entree
$change = htmlspecialchars($_GET["change"]);
$value = htmlspecialchars($_POST["change_value"]);
if (!check_value($change, $value, $db)) {
    update_settings($change, $value, $_SESSION["id"], $db);
    header("Location: user.php?settings=true"); //On renvoie a la page des parametres une fois la modification terminee
    exit;
}
$_SESSION["error_change"] = true;
header("Location: user.php?settings=true"); //Sinon on affiche un message d'erreur
?>
