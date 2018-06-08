<?php
session_start();

function checkfor_status()
{
  if (isset($_SESSION['userid'])) {
    return true;
  }else {
    return false;
  }
}

function logout()
{
  session_destroy();
}

function register($email, $passwort, $passwort2)
{
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

function login($email, $password)
{
  $pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');

  $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $result = $statement->execute(array('email' => $email));
  $user = $statement->fetch();
  echo $user['passwort'] . "<br>" . hash_password($password);

  if ($user !== false && hash_password($password) == $user['passwort']) {
    $_SESSION['userid'] = $user['id'];
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
  $password_hash = password_hash($value, PASSWORD_DEFAULT);
  return $password_hash;
}
?>
