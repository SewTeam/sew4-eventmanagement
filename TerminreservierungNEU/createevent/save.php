<?php

session_start();

//$userid = $_SESSION["userid"];
$userid = 123;
$values = array();

foreach($_POST as $key => $value){
    array_push($values, $value);
}
try{
    $pdo = new PDO('mysql:host=skanda.at;dbname=ni1504185_1sql1', 'ni1504185_1sql1', '1234');


    $statement = $pdo->prepare("INSERT INTO votings (title, description, creatorId) VALUES (:title, :description, :creatorId)");
    $result = $statement->execute(array('title' => $values[0], 'description' => $values[1], 'creatorId' => $userid));

/*
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO votings (title, description, creatorId) VALUES ($values[0], $values[1], $userid);");
    */
}
catch(PDOException $e){
    echo $e->getMessage();
}
$pdo = null;

header("Location: http://skanda.at/createevent");

?>
