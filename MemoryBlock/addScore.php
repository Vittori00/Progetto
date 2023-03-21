<?php

require_once 'dbconnect.php';
var_dump("ciao sono qui");
$score = $_GET['score'];
$user = $_GET['user'];

$sql = "INSERT INTO scoreboard (username, score) VALUES (:username, :score)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $user);
$stmt->bindParam(':score', $score);

if ($stmt->execute()) {
    echo "Dati inseriti con successo";
} else {
    echo "Errore nell'inserimento dei dati";
}

$conn = null;

?>