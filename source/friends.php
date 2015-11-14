<?php //Affiche les amis de l'utilisateur
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
echo "<ul>"; //On creer une liste pour ordonner le rangement des amis
while ($data = $query -> fetch()) {
    $friend_login = get_user_login($data["user2"], $db);
    echo "<li>" . $friend_login . "</li><br>";
}
echo "</ul>";
?>
