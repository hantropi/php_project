<?php
if (!empty($_POST["username"]) AND !empty($_POST["password"])) {
    echo "<h2>Identification reussie</h2>" . "<br>";
    $user_name = htmlspecialchars($_POST["username"]);
    $user_password = htmlspecialchars($_POST["password"]);
}
?>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <h1>Login</h1>
    <form action="login.php" method="post">
      <label for="username">Username:</label> <input type="text" id="username" name="username"/><br>
      <label for="password">Password:</label> <input type="password" id="password" name="password"/><br>
      <input type="submit" value="Connexion"/>
    </form>
  </body>
</html>
