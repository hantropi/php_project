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

function check_user($login, $password, $email, $db) {
    if (empty($email)) { //On ne chercher pas la valeur du champ email car elle n'est pas rentree par l'utilisateur
	$query = $db -> prepare("SELECT * FROM users WHERE login = :login AND password = :password");
	$query -> execute(array("login" => $login,
	    "password" => $password));
	$data = $query -> fetch();
	$condition = $data["login"] == $login and $data["password"] == $password;
    }
    else if (empty($password)) { //Sinon on peut s'enregistrer avec un login et un mail deja utilise mais avec mot de passe different
	$query = $db -> prepare("SELECT * FROM users WHERE login = :login AND email = :email");
	$query -> execute(array("login" => $login,
	    "email" => $email));
	$data = $query -> fetch();
	$condition = $data["login"] == $login and $data["email"] == $email;
    }
    else //Au cas ou on utilise la fonction avec des arguments vide ou null autre que les precedents definis
	return false;
    if ($condition)
	return true;
    return false;
}
?>
