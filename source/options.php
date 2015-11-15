<?php //Affiche les infos de l'utilisateur
$query = $db -> prepare("SELECT * FROM users WHERE id = ?");
$query -> execute(array($_SESSION["id"]));
$info = $query -> fetch();

echo "Login : " . $info["login"] . "<br>";
echo "Prenom : " . $info["first_name"] . "<br>";
echo "Nom : " . $info["last_name"] . "<br>";
echo "Age : " . $info["age"] . "<br>";
echo "Pays : " . $info["country"] . "<br>";
echo "Email : " . $info["email"] . "<br>";
?>
