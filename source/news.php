<?php //Affiche les evenements recents en lien avec l'utilisateur
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
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
?>
