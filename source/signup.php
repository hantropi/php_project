<?php
session_start();
include_once "library.php";

$db = connect();

if (!empty($_POST["login_su"]) AND !empty($_POST["password_su"]) AND !empty($_POST["email_su"])) {
    $login = htmlspecialchars($_POST["login_su"]);
    $password = htmlspecialchars($_POST["password_su"]);
    $email = htmlspecialchars($_POST["email_su"]);
    
    $query = $db -> prepare("SELECT * FROM users WHERE login = :login OR email = :email");
    $query -> execute(array("login" => $login,
	"email" => $email));
    
    if (!$query -> fetch()) {
	add_member($login, $password, $email, $db);
	$_SESSION["id"] = get_user_id($login, $db);
	header("Location: user.php?news=true");
	exit;
    }
    $_SESSION["add_error_msg"] = "Sorry, that username or email is already use. Please try again.";
}
else
    $_SESSION["add_error_msg"] = "Sorry, an information requiered is empty . Please try again.";
header("Location: home.php"); //Changer avec la page du nouveau utilisateur
?>
