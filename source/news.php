<?php //Affiche les evenements recents en lien avec l'utilisateur
//On creer un tableau contenant l'id de l'utilisateur et de chacun de ses amis
$users = array($_SESSION["id"]);
$query = $db -> prepare("SELECT user2 FROM friends WHERE user1 = ?");
$query -> execute(array($_SESSION["id"]));
while ($data = $query -> fetch()) {
    $users[] = $data["user2"];
}
$query -> closeCursor();

//On execute une requete pour obtenir chaques messages et lien entre utilisateurs
$users_string = implode(",", $users);
$query = $db -> prepare("SELECT * FROM posts WHERE user IN ($users_string) ORDER BY id DESC LIMIT 0, 50"); //Rajouter une limite de nombre et de temps
$query -> execute($users);

//On affiche tous les posts obtenus
echo "<section>";
echo "<h2>Fil d'actualite</h2>";
while ($data = $query -> fetch()) {
    echo "<header>Message de <b>" . get_user_login($data["user"], $db) . "</b> :<br></header>"; //Afficher la date du post (si possible)
    echo "<article><b>" . $data["title"] . "</b><br>";
    echo nl2br($data["content"]) . "<br>";
    echo "<footer>Posted on " . $data["date_post"] . "</footer></article><br>";
}
echo "</section>";
?>
