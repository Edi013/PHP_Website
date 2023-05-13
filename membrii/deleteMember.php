<?php 
    include "../navigation-bar/navigation-bar.php";

    $lastName = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["lastNameToDelete"])){
        $lastName = $_REQUEST["lastNameToDelete"];
    }


    #validare server-side
    $valid = true;
    if(empty($lastName) || is_numeric($lastName)){
        $message = "Invalid input for new last name!";
        $valid = false;
    }

    if (!$valid) {
        header("Location: membrii.php?message=" . urlencode($message));
        exit();
    }

    include "../dbConnection.php";
    $lastName = mysqli_real_escape_string($connection, $lastName);#$_REQUEST["lastName"]);
    $lastName = htmlspecialchars($lastName);
   
    #see if the name already exists in list
    $stmt = $connection->prepare("SELECT * FROM membrii WHERE LastName = ?");
    $stmt->bind_param("s", $lastName);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "Record with LastName '$lastName' doesn't exists.";
        header("Location: membrii.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    $stmt = $connection->prepare("DELETE FROM membrii WHERE LastName = ?");
    $stmt->bind_param("s", $lastName);
    $stmt->execute();   
    if($stmt->error){
        $message = "Record with LastName '$lastName' couldn't be deleted.";
        header("Location: membrii.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }

    $message = "Record with LastName '$lastName' deleted.";
    header("Location: membrii.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    exit();
    include "../footer/footer.php";
?>