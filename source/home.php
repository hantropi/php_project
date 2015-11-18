<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8"/>
    <!-- <link rel="stylesheet" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css"> Pas utile maintenant -->
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
	if (!empty($_GET["error_signup"]))
	    echo "<b>Sorry, an information requiered is already use or empty . Please try again.</b><br>";
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
	if (isset($_GET["error_signin"]))
	    echo "<b>Sorry, that username or password is incorrect. Please try again.</b><br>";
	?>
	<label for="login_si">Login :</label> <input type="text" id="login_si" name="login_si"/><br>
	<label for="password_si">Mot de passe :</label> <input type="password" id="password_si" name="password_si"/><br>
	<input type="submit" value="Sign in"/>
      </fieldset>
    </form>
  </body>
</html>
