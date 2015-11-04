<?php
function connexion() {
    try {
	$db = new PDO("mysql:host=localhost;dbname=php_project;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
    }
    catch (Exception $e) {
	die("Error : " . $e -> getMessage());
    }
}

function add_member($login, $password, $email, $db) {
    $query = $db -> prepare("INSERT INTO users(login, password, email) VALUES(:login, :password, :email)");
    $query -> execute(array("login" => $login,
	"email" => $email,
	"password" => $password));
}

function check_user($login, $password, $db) {
    $query = $db -> prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $query -> execute(array("login" => $login,
	"password" => $password));
    while ($data = $query -> fetch()) {
	if ($data["login"] == $login and $data["password"] == $password)
	    return true;
    }
    return false;
}
?>
