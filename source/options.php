<?php //Affiche les infos de l'utilisateur
$info = return_user_infos($_SESSION["id"], $db);
echo "Login : " . $info["login"] . "<br>";
echo "Prenom : " . $info["first_name"] . "<br>";
echo "Nom : " . $info["last_name"] . "<br>";
echo "Age : " . $info["age"] . "<br>";
echo "Pays : " . $info["country"] . "<br>";
echo "Email : " . $info["email"] . "<br>";
?>
