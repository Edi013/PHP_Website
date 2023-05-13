<?php 
    include "../navigation-bar/navigation-bar.php";

    $oldHour = 0;
    $newHour = 0;
    $oldDay = "";
    $newDay = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["oldBeginningHour"])){
        $oldHour = $_REQUEST["oldBeginningHour"];
    }
    if(isset($_REQUEST["newBeginningHour"])){
        $newHour = $_REQUEST["newBeginningHour"];
    }
    if(isset($_REQUEST["oldDay"])){
        $oldDay = $_REQUEST["oldDay"];
    }
    if(isset($_REQUEST["newDay"])){
        $newDay = $_REQUEST["newDay"];
    }

    #validare server-side
    $valid = true;
    if(empty($oldHour) || !is_numeric($oldHour)){
        $message =  "Invalid input for old hour!";
        $valid = false;
    }
    if(empty($newHour) || !is_numeric($newHour)){
        $message = "Invalid input for new hour!";
        $valid = false;
    }
    if(empty($oldDay) || is_numeric($oldDay)){
        $message = "Invalid input for old day!";
        $valid = false;
    } 
    if(empty($newDay) || is_numeric($newDay)){
        $message = "Invalid input for new day!";
        $valid = false;
    } 

    if (!$valid) {
        header("Location: program.php?message=" . urlencode($message));
        exit();
    }

    include "../dbConnection.php";
    $oldDay = mysqli_real_escape_string($connection, $oldDay);
    $oldDay = htmlspecialchars($oldDay);
    $newDay = mysqli_real_escape_string($connection, $newDay);
    $newDay = htmlspecialchars($newDay);

    #verificam daca datele noi de introdus este deja existent
    $stmt = $connection->prepare("SELECT * FROM program WHERE BeginningHour = ? and Day = ?");
    $stmt->bind_param("is", $newHour, $newDay);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows > 0){
        $message = "Beginning hour $newHour for day $newDay is already set.";
        header("Location: program.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #verificam daca numele vechi exista. Nu putem modifica ceva ce nu exista.
    $stmt = $connection->prepare("SELECT * FROM program WHERE BeginningHour = ? and Day = ?");
    $stmt->bind_param("is", $oldHour, $oldDay);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "Beginning hour $oldHour for day $oldDay doesn't exists.";
        header("Location: program.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #facem update-ul
    $stmt = $connection->prepare("UPDATE program SET BeginningHour = ?, Day = ? WHERE BeginningHour = ? and Day = ?");
    $stmt->bind_param("isis", $newHour, $newDay, $oldHour, $oldDay);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error setting appointment: " . $connection->error;
        header("Location: program.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    } 

    #totul s-a terminat cu succes
    $message = "Appointment set successfully.";
    header("Location: program.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    include "../footer/footer.php";
?>