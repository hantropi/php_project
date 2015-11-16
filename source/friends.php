<?php //Affiche les amis de l'utilisateur
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
$query -> closeCursor(); //Creer une liste contenant tous les amis

echo "<table>"; //On creer un tableau pour ordonner le rangement des amis
echo "<tr>";
echo "<th>Login</th>";
echo "<th>Prenom</th>";
echo "<th>Nom</th>";
echo "<th>Email</th>";
echo "</tr>";
$query = $db -> prepare("SELECT * FROM users WHERE id = "); //Faire une requete pour obtenir toutes les donnees de chacun des amis
$query -> execute(array($data["user2"]));
echo "</table>";
?>
