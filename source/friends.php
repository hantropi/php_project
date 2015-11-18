<?php //Gere la recherche et l'affichage des amis de l'utilisateur
require "friends/search_friend.html";
if (isset($_POST["friend_name"]))
    require "friends/search_friend.php";
if (isset($_GET["add_friend"]))
    require "friends/add_friend.php";
require "friends/display_friends.php";
?>
