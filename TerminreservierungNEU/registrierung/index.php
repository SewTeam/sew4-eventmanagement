<?php
session_start();
$pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrierung</title>
</head>
<link rel="stylesheet" href="../css/bootstrap.css">
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $vn = $_POST['vorname'];
    $nn = $_POST['nachname'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vn, 'nachname' => $nn));

        if($result) {
            header("Location:../index.php");
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
?>

<div>
  <div class="text-center">
    <h1>Registrieren</h1>
  </div>
  <div class="text-center">
    <form action="?register=1" method="post">
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email"><br><br>
    Vorname:<br>
    <input type="text" size="40"  maxlength="250" name="vorname"><br><br>
    Nachname:<br>
    <input type="text" size="40"  maxlength="250" name="nachname"><br><br>
    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="passwort"><br><br>
    Passwort wiederholen:<br>
    <input type="password" size="40" maxlength="250" name="passwort2"><br><br>
    <input type="submit" value="Abschicken">
    <a href="../index.php">Login</a>
    </form>
  </div>
</div>

<?php
} //Ende von if($showFormular)
?>

</body>
</html>
