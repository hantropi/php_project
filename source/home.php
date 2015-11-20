<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="global.css">
  </head>
  <body>
    <h1>PHP Project</h1>
    
    <form action="sign/signup.php" method="post">
      <fieldset>
	<legend>
	  <h2>Inscription</h2> <!-- Sign Up -->
	</legend>
	<?php
	if (isset($_SESSION["error_signup"])) {
	    echo "<b>Une information requise est deja utilisee ou vide. Reessayer.</b><br>";
	    unset($_SESSION["error_signup"]);
	}
	?>
	<label for="login_su">Login :</label> <input type="text" id="login_su" name="login_su"/><br>
	<label for="password_su">Mot de passe :</label> <input type="password" id="password_su" name="password_su"/><br>
	<label for="email_su">Email :</label> <input type="text" id="email_su" name="email_su"/><br>
	<input type="submit" value="Sign up"/>
      </fieldset>
    </form><br>
    
    <form action="sign/signin.php" method="post">
      <fieldset>
	<legend>
	  <h2>Connexion</h2> <!-- Sign In -->
	</legend>
	<?php
	if (isset($_SESSION["error_signin"])) {
	    echo "<b>Le login et/ou le mot de passe est incorrecte. Reessayer.</b><br>";
	    unset($_SESSION["error_signin"]);
	}
	?>
	<label for="login_si">Login :</label> <input type="text" id="login_si" name="login_si"/><br>
	<label for="password_si">Mot de passe :</label> <input type="password" id="password_si" name="password_si"/><br>
	<input type="submit" value="Sign in"/>
      </fieldset>
    </form>
  </body>
</html>
