<?php
$friend_name = htmlspecialchars($_GET["friend_name"]);
$query = $db -> prepare("SELECT * FROM users WHERE login = :name OR first_name = :name OR last_name = :name");
$query -> execute(array("name" => $friend_name));
$data = $query -> fetch();
$query -> closeCursor();

if ($data) {
    echo "Login : " . $data["login"] . "<br>";
    echo "Prenom : " . $data["first_name"] . "<br>";
    echo "Nom : " . $data["last_name"] . "<br>";
    echo "Age : " . $data["age"] . "<br>";
    echo "Pays : " . $data["country"] . "<br>";
    echo "Email : " . $data["email"] . "<br>";
    
    $_SESSION["friend_id"] = $data["id"];
    $query = $db -> prepare("SELECT * FROM friends WHERE user1 = :user1 AND user2 = :user2");
    $query -> execute(array("user1" => $_SESSION["id"],
	"user2" => $_SESSION["friend_id"]));
    $user_friend = $query -> fetch();
    $query -> closeCursor();
    
    if ($_SESSION["friend_id"] != $_SESSION["id"] and !$user_friend) //Pour eviter de s'ajouter soi meme en ami
	echo "<a href='user.php?friend_name=true&&add_friend=true'>Ajouter</a><br>";
}
else
    echo "Votre requete ne donne aucun resultat." . "<br>";

if (isset($_GET["add_friend"])) {
    $query = $db -> prepare("INSERT INTO friends(user1, user2) VALUES(:user1, :user2)");
    $query -> execute(array("user1" => $_SESSION["id"],
	"user2" => $_SESSION["friend_id"]));
    unset($_SESSION["friend_id"]);
    header("Location: user.php?friends=true");
    exit;
}
?>
