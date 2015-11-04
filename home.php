<?php
//Mettre les cookies + variables de session
?>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8"/>
  </head>
  <body>
    <h1>Sign up</h1>
    <form action="signup.php" method="post">
      <label for="login_su">Username :</label> <input type="text" id="login_su" name="login_su"/><br>
      <label for="password_su">Password :</label> <input type="password" id="password_su" name="password_su"/><br>
      <label for="email_su">Email :</label> <input type="text" id="email_su" name="email_su"/><br>
      <input type="submit" value="Sign up"/>
    </form>
    <h1>Sign in</h1>
    <form action="signin.php" method="post">
      <label for="login_si">Login :</label> <input type="text" id="login_si" name="login_si"/><br>
      <label for="password_si">Password :</label> <input type="password" id="password_si" name="password_si"/><br>
      <input type="submit" value="Sign in"/>
    </form>
  </body>
</html>
