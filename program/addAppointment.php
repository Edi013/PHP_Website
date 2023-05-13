<?php 
    include "../navigation-bar/navigation-bar.php";

    $beginningHour = "";
    $name = "";
    $duration = 0;
    $day = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["beginningHour"])){
        $beginningHour = $_REQUEST["beginningHour"];
    }
    if(isset($_REQUEST["name"])){
        $name = $_REQUEST["name"];
    }
    if(isset($_REQUEST["duration"])){
        $duration = $_REQUEST["duration"];
    }
    if(isset($_REQUEST["day"])){
        $day = $_REQUEST["day"];
    }

    #validare server-side
    $valid = true;
    if(empty($beginningHour) || !is_numeric($beginningHour) ){
        $message =  "Invalid input for beginning hour!";
        $valid = false;
    }
    if(empty($name) || is_numeric($name)){
        $message = "Invalid input for name!";
        $valid = false;
    }  
    if(empty($duration) || !is_numeric($duration)){
        $message = "Invalid input for duration!";
        $valid = false;
    }  
    if(empty($day) || is_numeric($day)){
        $message = "Invalid input for day!";
        $valid = false;
    } 

    include "../dbConnection.php";
    $beginningHour = mysqli_real_escape_string($connection, $beginningHour);
    $beginningHour = htmlspecialchars($beginningHour);
    $name = mysqli_real_escape_string($connection, $name);
    $name = htmlspecialchars($name);
    $duration = mysqli_real_escape_string($connection, $duration);
    $duration = htmlspecialchars($duration);
    $day = mysqli_real_escape_string($connection, $day);
    $day = htmlspecialchars($day);

    #verificam daca deja exista
    $result = $connection->prepare("SELECT * FROM program WHERE  Day = ? and BeginningHour = ?");
    $result->bind_param("ss", $day, $beginningHour);
    $result->execute();    
    $result = $result->get_result();
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        if($row["Day"] == $day && $row["BeginningHour"] == $beginningHour)
        {
            $valid = false;
            $message =  "Appointment is already set.";
        }
    }
    $result->close();

    if (!$valid) {
        header("Location: program.php?message=" . urlencode($message));
        $connection->close();
        exit();
    }

    #inseram noul membru
    $stmt = $connection->prepare("INSERT INTO program (BeginningHour, SubjectName, Duration, Day) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $beginningHour, $name, $duration, $day);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error setting appointment: " . $connection->error;
        header("Location: program.php?message=". urlencode($message));
        $stmt->close();
        $connection->close();
        exit();
    }
    
    $message = "Appointment inserted successfully.";
    header("Location: program.php?message=". urlencode($message));
    $stmt->close();
    $connection->close();
    include "../footer/footer.php";
?>