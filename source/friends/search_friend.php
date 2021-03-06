<?php //Recherche le login/prenom/nom de l'ami dans la base de donnee, et affiche ses infos si il existe
$friend_name = htmlspecialchars($_POST["friend_name"]);
$query = $db -> prepare("SELECT * FROM users WHERE login = :name OR first_name = :name OR last_name = :name");
$query -> execute(array("name" => $friend_name));
$data = $query -> fetch();
$query -> closeCursor();

$fields = ["Login", "Prenom", "Nom", "Age", "Pays", "Email"]; //Champs en sous forme ecrite courante
$db_fields = ["login", "first_name", "last_name", "age", "country", "email"]; //Champs de la base de donnee

if ($data) {
    echo "<div id='search_friend'>";
    for ($i = 0 ; $i < 6 ; $i++) {
	echo $fields[$i] . " : " . $data[$db_fields[$i]] . "<br>";
    }
    
    $_SESSION["friend_id"] = $data["id"];
    $query = $db -> prepare("SELECT * FROM friends WHERE user1 = :user1 AND user2 = :user2");
    $query -> execute(array("user1" => $_SESSION["id"],
	"user2" => $_SESSION["friend_id"]));
    $user_friend = $query -> fetch();
    $query -> closeCursor();
    
    if ($_SESSION["friend_id"] != $_SESSION["id"] and !$user_friend) //Pour eviter de s'ajouter soi meme ou un utilisateur qu'on a deja en ami
	echo "<br><a href='friends.php?add_friend=true'>Ajouter</a><br>";
    echo "</div>";
}
else
    echo "<p id='error'>Votre requete ne donne aucun resultat.</p>";
?>
