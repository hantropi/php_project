<?php
session_start();
include_once "../library.php";

$db = connect();

if (!empty($_POST["login_su"]) AND !empty($_POST["password_su"]) AND !empty($_POST["email_su"])) {
    $login = htmlspecialchars($_POST["login_su"]);
    $password = htmlspecialchars($_POST["password_su"]);
    $email = htmlspecialchars($_POST["email_su"]);
    
    $query = $db -> prepare("SELECT * FROM users WHERE login = :login OR email = :email");
    $query -> execute(array("login" => $login,
	"email" => $email));
    
    if (!$query -> fetch()) { //Si le nom ou l'email n'est pas deja utilise
	add_member($login, $password, $email, $db); //On rajoute cet utilisateur
	$_SESSION["id"] = get_user_id($login, $db);
	header("Location: ../user.php");
	exit;
    }
}
$_SESSION["error_signup"] = true;
header("Location: ../home.php");
?>
