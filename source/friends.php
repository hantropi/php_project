<form action="friends.php" method="get">
  <label for="search_friend">Rechercher un ami :</label> <input type="text" id="search_friend" name="friend_name">
  <input type="submit" value="Rechercher">
</form>

<?php
if (isset($_GET["friend_name"])) { //Recherche un ami
    $friend_name = htmlspecialchars($_GET["friend_name"]);
    $data = search_friend($friend_name, $_SESSION["id"], $db);
    if ($data) {
	echo "Login : " . $data["login"] . "<br>";
	echo "Prenom : " . $data["first_name"] . "<br>";
	echo "Nom : " . $data["last_name"] . "<br>";
	echo "Age : " . $data["age"] . "<br>";
	echo "Pays : " . $data["country"] . "<br>";
	echo "Email : " . $data["email"] . "<br>";
	$_SESSION["friend_id"] = $data["id"];
	if ($_SESSION["friend_id"] != $_SESSION["id"] and !check_user_friend($_SESSION["id"], $_SESSION["friend_id"], $db)) //Pour eviter de s'ajouter soi meme en ami
	    echo "<a href='friends.php?add_friend=true'>Ajouter</a><br>";
    }
    else
	echo "Votre requete ne donne aucun resultat." . "<br>";
}
if (isset($_GET["add_friend"])) {
    $query = $db -> prepare("INSERT INTO friends(user1, user2) VALUES(:user1, :user2)");
    $query -> execute(array("user1" => $_SESSION["id"],
	"user2" => $_SESSION["friend_id"]));
    unset($_SESSION["friend_id"]);
    header("Location: friends.php");
    exit;
}
?>

<h2>Amis</h2>

<?php //Affiche les amis de l'utilisateur
display_user_friends($_SESSION["id"], $db);
?>
