<?php
if (isset($_GET["add"])) {
    $friend_id = htmlspecialchars($_GET["friend_id"]);
    $user_id = htmlspecialchars($_GET["user_id"]);
    $db = htmlspecialchars($_GET["db"]);
    add_friend($friend_id, $user_id, $db);
}
function add_friend($friend_id, $user_id, $db) {
    $query = $db -> prepare("INSERT INTO friends(user1, user2) VALUES(:user1, :user2)");
    $query -> execute(array("user1" => $user_id,
	"user2" => $friend_id));
    header("Location: friends.php");
    exit;
}
?>
