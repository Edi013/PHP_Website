<?php 
    include "../navigation-bar/navigation-bar.php";

    $hour = 0;
    $day = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["beginningHourToDelete"])){
        $hour = $_REQUEST["beginningHourToDelete"];
    }
    if(isset($_REQUEST["dayToDelete"])){
        $day = $_REQUEST["dayToDelete"];
    }


    #validare server-side
    $valid = true;
    if(empty($hour) || !is_numeric($hour)){
        $message = "Invalid input for hour!";
        $valid = false;
    }
    if(empty($day) || is_numeric($day)){
        $message = "Invalid input for day!";
        $valid = false;
    }


    if (!$valid) {
        header("Location: program.php?message=" . urlencode($message));
        exit();
    }

    include "../dbConnection.php";
    $day = mysqli_real_escape_string($connection, $day);
    $day = htmlspecialchars($day);
   
    #see if the data exists in list
    $stmt = $connection->prepare("SELECT * FROM program WHERE BeginningHour = ? and Day = ?");
    $stmt->bind_param("is", $hour, $day);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "Record with hour '$hour' in day $day doesn't exists.";
        header("Location: program.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    $stmt = $connection->prepare("DELETE FROM program WHERE BeginningHour = ? and Day = ?");
    $stmt->bind_param("is", $hour, $day);
    $stmt->execute();   
    if($stmt->error){
        $message = "Record with hour '$hour' in day $day couldn't be deleted.";
        header("Location: program.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }

    $message = "Record with hour '$hour' in day $day deleted.";
    header("Location: program.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    exit();
    include "../footer/footer.php";
?>