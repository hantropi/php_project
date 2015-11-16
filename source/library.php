<?php
function connect() {
    /* Fonction permettant de ce connecter a la base de donnee du site */
    try {
	$db = new PDO("mysql:host=localhost;dbname=php_project;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
?>
