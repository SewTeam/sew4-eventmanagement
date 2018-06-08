<?php
session_start();
$userid = $_SESSION["userid"];

$pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>My Events</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="center">
      <div class="text-center">
        <h1>Meine Votings</h1>
      </div>
    <div class="center">
      <a href="../createevent/index.php">neues Voting erstellen</a><br>
      <a href="index.php">Alle Votings</a>
    </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Eventname</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Erstellt von</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $pdo->query("SELECT title, description, creatorId, id FROM votings WHERE creatorId = $userid");
          while($row = $result->fetch()){
            $emailResult = $pdo->query("SELECT vorname FROM users WHERE id = $row[2]");
            $email = $emailResult->fetch();
            echo '<tr><td><a href="../event/event.php?id='.$row[3].'">'.$row[0].'</a></td>';
  			    echo '<td>'.$row[1].'</td>';
  			    echo '<td>'.$email["vorname"].'</td>';
          	echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
