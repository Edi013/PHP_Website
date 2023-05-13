<?php 
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "proiect-tw";

$connection = new mysqli($serverName, $userName, $password, $dbName);

if($connection->connect_error){
    die("Connection with database failed: " . $connection->connect_error);
    exit();
}
?>