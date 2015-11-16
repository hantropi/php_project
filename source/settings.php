<?php //Affiche les infos de l'utilisateur
$query = $db -> prepare("SELECT * FROM users WHERE id = ?");
$query -> execute(array($_SESSION["id"]));
$info = $query -> fetch();

echo "Login : " . $info["login"] . " <a href='user.php?change=login'>Modifier</a><br>";
echo "Prenom : " . $info["first_name"] . " <a href='user.php?change=first_name'>Modifier</a><br>";
echo "Nom : " . $info["last_name"] . " <a href='user.php?change=last_name'>Modifier</a><br>";
echo "Age : " . $info["age"] . " <a href='user.php?change=age'>Modifier</a><br>";
echo "Pays : " . $info["country"] . " <a href='user.php?change=country'>Modifier</a><br>";
echo "Email : " . $info["email"] . " <a href='user.php?change=email'>Modifier</a><br>";
?>
