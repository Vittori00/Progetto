<?php
    
require_once "connectdb.php";
    
$connection = new connectDB();
$pdo = $connection->getPDO();
    
$result = $connection->query("SELECT MAX(ID) FROM Punteggi");
$row = mysql_fetch_row($result);
$nuovo_id = $row[0]+1;

$username = $_POST["username"];
$score = $_POST["score"];

$sql = "INSERT INTO scoreboard (username, score) VALUES (:username, :punteggio)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":score", $punteggio);
$stmt->execute();

console.log("Record inserito con successo!"); 
?>