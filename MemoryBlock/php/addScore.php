<?php
//Prevents CORS blocking HTTP request from another domain (localhost:3000) 
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");

require_once 'connectdb.php';

$score = $_GET['score'];
$user = $_GET['username'];

if($user == ""){
    $user = "AAA"; 
}

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