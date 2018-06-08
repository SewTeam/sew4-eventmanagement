<?php
session_start();
$pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        header("Location:myevents/index.php");
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<link rel="stylesheet" href="../css/bootstrap.css">
<body>

<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
<div>
  <div class="text-center">
    <h1>Login</h1>
  </div>
  <div class="text-center">
    <form action="?login=1" method="post">
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email"><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="passwort"><br><br>

    <input type="submit" value="Abschicken">
    <a href="registrieren/index.php">Registrieren</a>
  <div>
</div>
  </form>
</body>
</html>
