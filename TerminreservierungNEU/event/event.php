<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Event</title>
  </head>
  <body>
    <?php
    $servername = "skanda.at";
    $username = "ni1504185_1sql1";
    $password = "1234";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT title, description, creatorId FROM votings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Titel: " . $row["title"]. " - Beschreibung: " . $row["description"]. "Erstellt von: " . $row["creatorId"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
  </body>
</html>
