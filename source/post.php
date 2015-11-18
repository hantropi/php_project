<?php
if (isset($_GET["error_post"]))
    echo "<b>Titre et/ou contenu du message vide ou probleme lors de l'envoie.</b><br>";
require "post/send_post.html";
if (isset($_POST["title"]) and isset($_POST["content"]))
    require "post/send_post.php";
?>
