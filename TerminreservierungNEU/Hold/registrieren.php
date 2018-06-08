<?php
require_once('sessions.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrierung</title>
</head>
<body>

  <?php
  if(isset($_GET['register'])) {
    if(register($_POST['email'],$_POST['passwort'],$_POST['passwort2'])) {
      header("Location: ../index.php");
      ?>

      Registrierung erfolgreich! <a href="einloggen.php">Hier zum Login!</a>

      <?php
    }else {

      ?>
      Es ist leider ein Fehler aufgetreten! Bitte versuchen Sie es erneut!
      <form action="?register=1" method="post">
        E-Mail:<br>
        <input type="email" size="40" maxlength="250" name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40"  maxlength="250" name="passwort"><br>

        Passwort wiederholen:<br>
        <input type="password" size="40" maxlength="250" name="passwort2"><br><br>

        <input type="submit" value="Abschicken">
      </form>
      <?php
    }
  }else {

    ?>
    Willkommen zum Login!
    <form action="?register=1" method="post">
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br><br>

      Dein Passwort:<br>
      <input type="password" size="40"  maxlength="250" name="passwort"><br>

      Passwort wiederholen:<br>
      <input type="password" size="40" maxlength="250" name="passwort2"><br><br>

      <input type="submit" value="Abschicken">
    </form>
    <?php
  }
  ?>

</body>
</html>
