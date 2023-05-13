<?php 

$serverName = "localhost";
$userName = "";
$password = "";
$dbName = "proiect-tw";

$connection = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Can't connect to database !";
    exit();
}
echo "Connection success"

?>