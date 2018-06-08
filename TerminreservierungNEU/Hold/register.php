<?php
function connect()
{
  session_start();
  $pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');
}

function register()
{
  connect();
  $email = $_POST['email'];
  $passwort = $_POST['passwort'];
  $passwort2 = $_POST['passwort2'];

  if (!validate_email($email) or !validate_password($passwort,$passwort2) or !check_email($email)) {
    return false;
  }

  $hashed_password = hash_password($passwort);
  $pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');
  $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :password)");
  $result = $statement->execute(array('email' => $email, 'password' => $hashed_password));

  if($result) {
      return true;
  } else {
      return false;
  }
}


function validate_email($value)
{
  if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return false;
  }else {
    return true;
  }
}

function validate_password($value,$value2)
{
  if($value == '' or $value2 != $value) {
      return false;
  }else{
    return true;
  }
}

function check_email($value)
{
  $pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');
  $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $result = $statement->execute(array('email' => $value));
  $user = $statement->fetch();

  if($user !== false) {
    return false;
  }else {
    return true;
  }
}

function hash_password($value)
{
  $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
  return $passwort_hash;
}
?>
