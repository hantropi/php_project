<?php
session_start();
include_once "library.php";

$db = connect();

if (!empty($_POST["login_si"]) AND !empty($_POST["password_si"])) {
    $login = htmlspecialchars($_POST["login_si"]);
    $password = htmlspecialchars($_POST["password_si"]);

    $query = $db -> prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $query -> execute(array("login" => $login,
	"password" => $password));
    
    if ($query -> fetch()) {
	$_SESSION["id"] = get_user_id($login, $db); //On creer une variable de session pour ce souvenir de l'utilisateur dans l'instance en cours
	header("Location: user.php?news=true");
	exit;
    }
}
header("Location: home.php?error_signin=true");
?>
