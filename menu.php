<?php
if (isset($_GET["signout"])) {
    unset($_SESSION["id"]);
    header("Location: home.php");
}

echo '<ul>
<li><a href="user.php">Fil d\'actualite</a></li>
<li><a href="friends.php">Gerer ses amis</a></li>
<li><a href="posts.php">Messages</a></li>
<li><a href="options.php">Options</a></li>
<li><a href="menu.php?signout=true">Deconnexion</a></li>
</ul>';
?>
