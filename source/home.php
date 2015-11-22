<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
  </head>
  <body>
    <h1>PHP Project</h1>
    <section>
      <h2>Inscription</h2>
      <?php
      if (isset($_SESSION["error_signup"])) {
	  echo "<p id='error'>Une information requise est deja utilisee ou vide. Reessayer.</p>";
	  unset($_SESSION["error_signup"]);
      }
      ?>
      <form action="sign/signup.php" method="post">
	<label for="login_su">Login :</label> <input type="text" id="login_su" name="login_su"/><br>
	<label for="password_su">Mot de passe :</label> <input type="password" id="password_su" name="password_su"/><br>
	<label for="email_su">Email :</label> <input type="text" id="email_su" name="email_su"/><br>
	<input type="submit" value="Inscription"/>
      </form>

      <h2>Connexion</h2>
      <?php
      if (isset($_SESSION["error_signin"])) {
	  echo "<p id='error'>Le login et/ou le mot de passe est incorrecte. Reessayer.</p>";
	  unset($_SESSION["error_signin"]);
      }
      ?>
      <form action="sign/signin.php" method="post">
	<label for="login_si">Login :</label> <input type="text" id="login_si" name="login_si"/><br>
	<label for="password_si">Mot de passe :</label> <input type="password" id="password_si" name="password_si"/><br>
	<input type="submit" value="Connexion"/>
      </form><br>
    </section>
  </body>
</html>
