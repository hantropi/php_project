<?php
function connexion() {
    try {
	$bdd = new PDO("mysql:host=localhost;dbname=minichat;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e) {
	die("Error : " . $e -> getMessage());
    }
}
?>
