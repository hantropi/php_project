<?php
require "send_post.html";
if (isset($_POST["title"]) and isset($_POST["content"]))
    require "send_post.php";
if (isset($_GET["error_post"]))
    echo "Titre et/ou contenu du message vide ou probleme lors de l'envoie.<br>";
?>
