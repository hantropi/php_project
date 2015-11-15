<?php //Affiche les evenements recents en lien avec l'utilisateur
//On creer un tableau contenant l'id de l'utilisateur et de chacun de ses amis
$users = array($_SESSION["id"]);
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
while ($data = $query -> fetch()) {
    $users[] = $data["user2"];
}
$query -> closeCursor();

//On execute une requete pour obtenir chaque messages
$users_string = implode(",", $users);
$query = $db -> prepare("SELECT user, title, content FROM posts WHERE user IN ($users_string)"); //Rajouter une limite de nombre et de temps
$query -> execute($users);

//On affiche tous les posts obtenus
while ($data = $query -> fetch()) {
    $login = get_user_login($data["user"], $db);
    echo "Message de <b>" . $login . "</b> :<br>"; //Afficher la date du post (si possible)
    echo "<b>" . $data["title"] . "</b><br>";
    echo $data["content"] . "<br><br>";
}
?>
