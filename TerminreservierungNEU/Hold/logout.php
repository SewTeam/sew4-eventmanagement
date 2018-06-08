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
if (logout()) {
  echo "Logout succesfull!";
}
 ?>
</body>
</html>
