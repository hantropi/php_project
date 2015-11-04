<?php
include_once("library.php");

$db = connexion();

if (!empty($_POST["login_si"]) AND !empty($_POST["password_si"])) {
    $login = htmlspecialchars($_POST["login_si"]);
    $password = htmlspecialchars($_POST["password_si"]);
    if (check_user($login, $password, $db))
	header("Location: home.php"); //Changer avec la page de l'utilisateur
    else
	header("Location: home.php");
}
else
    header("Location: home.php");
?>
