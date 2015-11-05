<?php
session_start();
include_once("library.php");

$db = connexion();

if (!empty($_POST["login_si"]) AND !empty($_POST["password_si"])) {
    $login = htmlspecialchars($_POST["login_si"]);
    $password = htmlspecialchars($_POST["password_si"]);
    if (check_user($login, $password, null, $db)) {
	header("Location: test.php"); //Changer avec la page de l'utilisateur
	exit;
    }
}
$_SESSION["login_error_msg"] = "Sorry, that username or password is incorrect. Please try again.";
header("Location: home.php");
?>
