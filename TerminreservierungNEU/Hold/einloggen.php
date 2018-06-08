<?php
require_once('sessions.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

  <?php
  if(isset($_GET['login'])) {
    if(login($_POST['email'],$_POST['passwort'])) {
      ?>
      You were succesfully logged in!
      <?php
    }else {
      ?>
      Your Input was incorrect! Please try again!
      <form action="?login=1" method="post">
        E-Mail:<br>
        <input type="email" size="40" maxlength="250" name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40"  maxlength="250" name="passwort"><br>

        <input type="submit" value="Abschicken">
      </form>

      <?php
    }
  }else {
    ?>
    <form action="?login=1" method="post">
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br><br>

      Dein Passwort:<br>
      <input type="password" size="40"  maxlength="250" name="passwort"><br>

      <input type="submit" value="Abschicken">
    </form>
    <?php
  }
  ?>
</body>
</html>
