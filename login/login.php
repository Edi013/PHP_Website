<?php
    session_start();

    function verifica($nume,$parola){
        $credentials = GetCredentialsFromDB();
        foreach($credentials as $row){            
            if ($nume == $row["Username"] && password_verify($parola, $row['Password'])){ # password_hash($row['Password'], PASSWORD_DEFAULT)
                return TRUE;
            }
        } 
        return FALSE;
    }

    function GetCredentialsFromDB(){
        include "../dbConnection.php";
        $result = $connection->execute_query("SELECT * FROM credentials;");
        $connection->close();
        return $result;
    }

    $nume = $_POST["userName"];
    $parola = $_POST["userPassword"];
    if(verifica($nume,$parola)){
        $_SESSION['userName'] = $nume;
        $_SESSION['loggedIn'] = TRUE;
    } else {
        $_SESSION['message'] = "Autentificare esuata";
    }
    header("Location: ../home/index.php");
?>

