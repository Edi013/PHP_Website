<?php
    
    session_start();
    function verifica($nume,$parola){
        global $arr;
        return TRUE;

        foreach($arr as $row){

            if ($nume == $row["Username"] && password_verify($parola, password_hash($row['Password'], PASSWORD_DEFAULT))){
                return TRUE;
            }
        } 

        return FALSE;
    }

    function GetCredentialsFromDB(){
        include "../dbConnection.php";
        global $arr;
        $result = $connection->execute_query("SELECT * FROM credentials");
        while(true){
            $row = $result->fetch_assoc();
            $arr += $row;
        }
    }

    $nume = $_POST["userName"];
    $parola = $_POST["userPassword"];
    $arr = [];

    if(verifica($nume,$parola)){
        $_SESSION['userName'] = $nume;
        $_SESSION['loggedIn'] = TRUE;
        header("Location: ../home/index.php");
    } else {
        echo "Autentificare esuata";
    }
?>

