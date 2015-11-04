<?php
include_once("library.php");

$db = connexion();

if (!empty($_POST["login_su"]) AND !empty($_POST["password_su"]) AND !empty($_POST["email_su"])) {
    $login = htmlspecialchars($_POST["login_su"]);
    $password = htmlspecialchars($_POST["password_su"]);
    $email = htmlspecialchars($_POST["email_su"]);
    add_member($login, $password, $email, $db);
}
header("Location: home.php");
?>
