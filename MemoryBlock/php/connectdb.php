<?php
//Prevents CORS blocking HTTP request from another domain (localhost:3000) 
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "pweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connessione fallita: " . $e->getMessage();
}
?>

