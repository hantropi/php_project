<?php
//Verifier la valeur par rapport au champ et autre utilisateurs
if ($change == "login") {
    $query = $db -> prepare("UPDATE users SET login = :value WHERE id = :user");
}
else if ($change == "first_name") {
    $query = $db -> prepare("UPDATE users SET first_name = :value WHERE id = :user");
}
else if ($change == "last_name") {
    $query = $db -> prepare("UPDATE users SET last_name = :value WHERE id = :user");
}
else if ($change == "age") {
    $query = $db -> prepare("UPDATE users SET age = :value WHERE id = :user");
}
else if ($change == "country") {
    $query = $db -> prepare("UPDATE users SET country = :value WHERE id = :user");
}
else if ($change == "email") {
    $query = $db -> prepare("UPDATE users SET email = :value WHERE id = :user");
}
else {
    header("Location: user.php?settings=true&settings_error=true");
    exit;
}
$query -> execute(array("value" => $value,
    "user" => $_SESSION["id"]));
header("Location: user.php?settings=true");
?>
