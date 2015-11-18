<?php
if (isset($_POST["title"]) and isset($_POST["content"])) {
    if (!empty($_POST["title"]) and !empty($_POST["content"])) {
	$title = htmlspecialchars($_POST["title"]);
	$content = htmlspecialchars($_POST["content"]);
	$query = $db -> prepare("INSERT INTO posts(user, title, content) VALUES(:user, :title, :content)");
	$query -> execute(array("user" => $_SESSION["id"],
	    "title" => $title,
	    "content" => $content));
	header("Location: user.php");
	exit;
    }
}
header("Location: user.php?post=true&error_post=true");
?>
