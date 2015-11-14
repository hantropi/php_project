<?php
function connect() {
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
	"password" => $password,
	"email" => $email));
}

function check_user_signup($login, $email, $db) {
    /* Fonction pour verifier les informations donnees lors de l'enregistrement d'un nouvel utilisateur */
    $query = $db -> prepare("SELECT * FROM users WHERE login = :login OR email = :email");
    $query -> execute(array("login" => $login,
	"email" => $email));
    if ($query -> fetch())
	return true;
    return false;
}

function check_user_signin($login, $password, $db) {
    /* Fonction pour ce connecter au site */
    $query = $db -> prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $query -> execute(array("login" => $login,
	"password" => $password));
    if ($query -> fetch())
	return true;
    return false;
}

function check_user_friend($user_id, $friend_id, $db) {
    $query = $db -> prepare("SELECT * FROM friends WHERE user1 = :user1 AND user2 = :user2");
    $query -> execute(array("user1" => $user_id,
	"user2" => $friend_id));
    return $query -> fetch();
}

function get_user_id($login, $db) {
    $query = $db -> prepare("SELECT id FROM users WHERE login = ?");
    $query -> execute(array($login));
    $data = $query -> fetch();
    return $data["id"];
}

function get_user_login($id, $db) {
    $query = $db -> prepare("SELECT login FROM users WHERE id = ?");
    $query -> execute(array($id));
    $data = $query -> fetch();
    return $data["login"];
}

function display_news_feed($id, $db) { //user.php
    /* Fonction affichant le fil d'actualite de l'utilisateur */
    $query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
    $query -> execute(array($id));
    while ($data = $query -> fetch()) { //On recupere l'id de chaque amis de l'utilisateur
	$sc_query = $db -> prepare("SELECT * FROM posts WHERE user = ?");
	$sc_query -> execute(array($data["user2"]));
	while ($sc_data = $sc_query -> fetch()) { //On affiche chaque messages ecrit par l'ami de l'utilisateur
	    $friend_login = get_user_login($sc_data["user"], $db);
	    echo "Message de " . $friend_login . "<br>";
	    echo $sc_data["title"] . "<br>";
	    echo $sc_data["content"] . "<br><br>";
	}
    }
}

function display_user_friends($id, $db) { //friends.php
    $query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
    $query -> execute(array($id));
    echo "<ul>"; //On creer une liste pour ordonner le rangement des amis
    while ($data = $query -> fetch()) {
	$friend_login = get_user_login($data["user2"], $db);
	echo "<li>" . $friend_login . "</li><br>";
    }
    echo "</ul>";
}

function return_user_infos($id, $db) { //options.php
    $query = $db -> prepare("SELECT * FROM users WHERE id = ?");
    $query -> execute(array($id));
    $info = $query -> fetch();
    return $info;
}

function search_friend($name, $user_id, $db) { //Search an another user in the database
    $query = $db -> prepare("SELECT * FROM users WHERE login = :name OR first_name = :name OR last_name = :name");
    $query -> execute(array("name" => $name));
    return $query -> fetch();
}
?>
