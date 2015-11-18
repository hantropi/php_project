<?php //Gere la recherche et l'affichage des amis de l'utilisateur
require "search_friend.html";
if (isset($_POST["friend_name"]))
    require "search_friend.php";
if (isset($_GET["add_friend"]))
    require "add_friend.php";
require "display_friends.php";
?>
