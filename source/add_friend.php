<?php
$query = $db -> prepare("INSERT INTO friends(user1, user2) VALUES(:user1, :user2)");
$query -> execute(array("user1" => $_SESSION["id"],
    "user2" => $_SESSION["friend_id"]));
unset($_SESSION["friend_id"]);
header("Location: user.php?friends=true");
?>
