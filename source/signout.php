<?php
session_start();

if (isset($_GET["signout"])) { //Signout function
    unset($_SESSION["id"]);
    header("Location: home.php");
}
?>
