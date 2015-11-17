<?php //
$friend_name = htmlspecialchars($_POST["friend_name"]);
$query = $db -> prepare("SELECT * FROM users WHERE login = :name OR first_name = :name OR last_name = :name");
$query -> execute(array("name" => $friend_name));
$data = $query -> fetch();
$query -> closeCursor();

$champs = ["Login", "Prenom", "Nom", "Age", "Pays", "Email"];
$informations = ["login", "first_name", "last_name", "age", "country", "email"];

if ($data) {
    for ($i = 0 ; $i < 6 ; $i++) {
	echo $champs[$i] . " : " . $data[$informations[$i]] . "<br>";
    }
    
    $_SESSION["friend_id"] = $data["id"];
    $query = $db -> prepare("SELECT * FROM friends WHERE user1 = :user1 AND user2 = :user2");
    $query -> execute(array("user1" => $_SESSION["id"],
	"user2" => $_SESSION["friend_id"]));
    $user_friend = $query -> fetch();
    $query -> closeCursor();
    
    if ($_SESSION["friend_id"] != $_SESSION["id"] and !$user_friend) //Pour eviter de s'ajouter soi meme en ami ou un utilisateur qu'on a deja en ami
	echo "<a href='user.php?friends=true&add_friend=true'>Ajouter</a><br>";
}
else
    echo "Votre requete ne donne aucun resultat." . "<br>";
?>
