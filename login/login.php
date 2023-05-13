<?php
    
    session_start();
    function verifica($nume,$parola){
    if ($nume == "admin" && $parola=="admin"){
        return TRUE;
    } else {
        return FALSE;
    }
    }

    $nume = $_POST["userName"];
    $parola = $_POST["userPassword"];

    if(verifica($nume,$parola)){
        $_SESSION['userName'] = $nume;
        $_SESSION['loggedIn'] = TRUE;
        header("Location: ../home/index.php");
    } else {
        echo "Autentificare esuata";
    }
?>