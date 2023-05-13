<?php 
    include "../navigation-bar/navigation-bar.php";

    $firstName = "";
    $lastName = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["firstName"])){
        $firstName = $_REQUEST["firstName"];
    }
    if(isset($_REQUEST["lastName"])){
        $lastName = $_REQUEST["lastName"];
    }

    #validare server-side
    $valid = true;
    if(empty($firstName) || is_numeric($firstName) ){
        $message =  "Invalid input for first name!";
        $valid = false;
    }
    if(empty($lastName) || is_numeric($lastName)){
        $message = "Invalid input for last name!";
        $valid = false;
    }   

    include "../dbConnection.php";
    $firstName = mysqli_real_escape_string($connection, $firstName);
    $firstName = htmlspecialchars($firstName);
    $lastName = mysqli_real_escape_string($connection, $lastName);
    $lastName = htmlspecialchars($lastName);

    #verificam daca deja exista
    $result = $connection->prepare("SELECT * FROM membrii WHERE  LastName = ?");
    $result->bind_param("s", $lastName);
    $result->execute();    
    $result = $result->get_result();
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        if($row["LastName"] == $lastName)
        {
            $valid = false;
            $message =  "Member is already inserted.";
        }
    }
    $result->close();

    if (!$valid) {
        header("Location: membrii.php?message=" . urlencode($message));
        $connection->close();
        exit();
    }

    #inseram noul membru
    $stmt = $connection->prepare("INSERT INTO membrii (FirstName, LastName) VALUES (?, ?)");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error inserting Member: " . $connection->error;
        header("Location: membrii.php?message=". urlencode($message));
        $stmt->close();
        $connection->close();
        exit();
    }
    
    $message = "Member inserted successfully.";
    header("Location: membrii.php?message=". urlencode($message));
    $stmt->close();
    $connection->close();
    include "../footer/footer.php";
?>