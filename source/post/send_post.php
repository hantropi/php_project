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
$_SESSION["error_post"] = true;
header("Location: post.php");
?>
