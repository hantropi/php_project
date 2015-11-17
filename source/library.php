<?php
function connect() {
    /* Fonction permettant de ce connecter a la base de donnee du site */
    try {
	$db = new PDO("mysql:host=localhost;dbname=php_project;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
    }
    catch (Exception $e) {
	die("Error : " . $e -> getMessage());
    }
}

function add_member($login, $password, $email, $db) {
    /* Fonction qui ajoute un utilisateur a la base de donnee */
    $query = $db -> prepare("INSERT INTO users(login, password, email) VALUES(:login, :password, :email)");
    $query -> execute(array("login" => $login,
	"password" => $password,
	"email" => $email));
}

function get_user_id($login, $db) {
    /* Fonction recuperant l'id d'un utilisateur */
    $query = $db -> prepare("SELECT id FROM users WHERE login = ?");
    $query -> execute(array($login));
    $data = $query -> fetch();
    return $data["id"];
}

function get_user_login($id, $db) {
    /* Fonction recuperant le login d'un utilisateur */
    $query = $db -> prepare("SELECT login FROM users WHERE id = ?");
    $query -> execute(array($id));
    $data = $query -> fetch();
    return $data["login"];
}

function check_value($change, $value, $db) {
    /* Verifie que l'entree est conforme */
    if ($change == "login") {
	$query = $db -> prepare("SELECT id FROM users WHERE login = ?");
	$query -> execute(array($value));
	return $query -> fetch();
    }
    else if ($change == "last_name") {
	$query = $db -> prepare("SELECT id FROM users WHERE last_name = ?");
	$query -> execute(array($value));
	return $query -> fetch();
    }
    else if ($change == "first_name") {
	$query = $db -> prepare("SELECT id FROM users WHERE first_name = ?");
	$query -> execute(array($value));
	return $query -> fetch();
    }
    else if ($change == "email") {
	$query = $db -> prepare("SELECT id FROM users WHERE email = ?");
	$query -> execute(array($value));
	return $query -> fetch();
    }
    else if ($change == "age") {
	if ($value > 1 and $value < 100) //L'age doit etre limitee
	    return false;
	return true;
    }
    else if ($change == "country") //On ce fiche de l'endroit ou vit l'utilisateur
	return false;
    return true;
}

function update_settings($change, $value, $id, $db) {
    /* Modifie la valeur rentree par rapport au champ souhaite */
    if ($change == "login")
	$query = $db -> prepare("UPDATE users SET login = :value WHERE id = :user");
    else if ($change == "last_name")
	$query = $db -> prepare("UPDATE users SET last_name = :value WHERE id = :user");
    else if ($change == "first_name")
	$query = $db -> prepare("UPDATE users SET first_name = :value WHERE id = :user");
    else if ($change == "age")
	$query = $db -> prepare("UPDATE users SET age = :value WHERE id = :user");
    else if ($change == "country")
	$query = $db -> prepare("UPDATE users SET country = :value WHERE id = :user");
    else if ($change == "email")
	$query = $db -> prepare("UPDATE users SET email = :value WHERE id = :user");
    else {
	header("Location: user.php?settings=true");
	exit;
    }
    $query -> execute(array("value" => $value,
	"user" => $id));
}
?>
