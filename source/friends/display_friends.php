<?php //Affiche les amis de l'utilisateur
//On creer un tableau contenant l'id de chacun des amis de l'utilisateur
$users = array();
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
while ($data = $query -> fetch()) {
    $users[] = $data["user2"];
}
$query -> closeCursor();

if ($users) {
    $users_string = implode(",", $users);
    $query = $db -> prepare("SELECT * FROM users WHERE id IN ($users_string)"); //Faire une requete pour obtenir toutes les donnees de chacun des amis
    $query -> execute($users);
}

echo "<h2>Amis</h2>";
echo "<table border='1'>"; //On creer un tableau pour ordonner le rangement des amis
echo "<tr>";
echo "<th>Login</th>";
echo "<th>Nom</th>";
echo "<th>Prenom</th>";
echo "<th>Age</th>";
echo "<th>Pays</th>";
echo "<th>Email</th>";
echo "</tr>";
while ($data = $query -> fetch()) {
    echo "<tr>";
    echo "<td>" . $data["login"] . "</td>";
    echo "<td>" . $data["last_name"] . "</td>";
    echo "<td>" . $data["first_name"] . "</td>";
    echo "<td>" . $data["age"] . "</td>";
    echo "<td>" . $data["country"] . "</td>";
    echo "<td>" . $data["email"] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
