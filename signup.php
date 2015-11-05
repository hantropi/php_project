<?php
session_start();
include_once("library.php");

$db = connexion();

if (!empty($_POST["login_su"]) AND !empty($_POST["password_su"]) AND !empty($_POST["email_su"])) {
    $login = htmlspecialchars($_POST["login_su"]);
    $password = htmlspecialchars($_POST["password_su"]);
    $email = htmlspecialchars($_POST["email_su"]);
    if (!check_user($login, null, $email, $db)) {
	add_member($login, $password, $email, $db);
	header("Location: test.php"); //Changer par la page du nouveau utilisateur
	exit;
    }
    $_SESSION["add_error_msg"] = "Sorry, that username or email is already use. Please try again.";
}
else
    $_SESSION["add_error_msg"] = "Sorry, an information requiered is empty . Please try again.";
header("Location: home.php"); //Changer avec la page du nouveau utilisateur
?>
