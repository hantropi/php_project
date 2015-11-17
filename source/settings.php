<?php //Affiche les infos de l'utilisateur
$query = $db -> prepare("SELECT * FROM users WHERE id = ?");
$query -> execute(array($_SESSION["id"]));
$info = $query -> fetch();

$champs = ["Login", "Nom", "Prenom", "Age", "Pays", "Email"];
$information = ['login', 'last_name', 'first_name', 'age', 'country', 'email'];

echo "<h2>Parametres</h2>";
echo "<table border='1'>";
for ($i = 0 ; $i < 6 ; $i++) {
    echo "<tr><td id='settings'>" . $champs[$i] . "</td><td>" . $info[$information[$i]] . "</td><td><a href='user.php?change=" . $information[$i] . "'>Modifier</a></td></tr>";
}
echo "</table>"
?>
