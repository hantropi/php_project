<?php
//Mettre les cookies + variables de session
?>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <h1>Sign up</h1>
    <form action="signup.php" method="post">
      <label for="username_signup">Username :</label> <input type="text" id="username_signup" name="username_signup"/><br>
      <label for="mail_signup">Mail :</label> <input type="text" id="mail_signup" name="mail_signup"/><br>
      <label for="password_signup">Password :</label> <input type="password" id="password_signup" name="password_signup"/><br>
      <input type="submit" value="Sign up"/>
    </form>
    <h1>Sign in</h1>
    <form action="signin.php" method="post">
      <label for="username_signin">Username :</label> <input type="text" id="username_signin" name="username_signin"/><br>
      <label for="password_signin">Password :</label> <input type="password" id="password_signin" name="password_signin"/><br>
      <input type="submit" value="Sign in"/>
    </form>
  </body>
</html>
