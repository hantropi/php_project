<?php
if (isset($_SESSION["error_post"])) {
    echo "<b>Titre et/ou contenu du message vide ou probleme lors de l'envoie.</b><br>";
    unset($_SESSION["error_post"]);
}
require "post/send_post.html";
if (isset($_POST["title"]) and isset($_POST["content"]))
    require "post/send_post.php";
?>
