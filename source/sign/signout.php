<?php
session_start();
session_destroy(); //On detruit toute les donnees de la session courante
header("Location: ../home.php");
exit;
?>
