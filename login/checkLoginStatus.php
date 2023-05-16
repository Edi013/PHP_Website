<?php 
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == FALSE){
        header("Location: ../home/index.php");
        exit();
    }
?>

