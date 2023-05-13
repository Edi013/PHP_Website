<?php 
    include "../navigation-bar/navigation-bar.php";

    $firstName = "";
    $lastName = "";
    $lastNameToModify = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["newFirstName"])){
        $firstName = $_REQUEST["newFirstName"];
    }
    if(isset($_REQUEST["newLastName"])){
        $lastName = $_REQUEST["newLastName"];
    }
    if(isset($_REQUEST["lastNameToModify"])){
        $lastNameToModify = $_REQUEST["lastNameToModify"];
    }

    #validare server-side
    $valid = true;
    if(empty($firstName) || is_numeric($firstName)){
        $message =  "Invalid input for new first name!";
        $valid = false;
    }
    if(empty($lastName) || is_numeric($lastName)){
        $message = "Invalid input for new last name!";
        $valid = false;
    }
    if(empty($lastNameToModify) || is_numeric($lastNameToModify)){
        $message = "Invalid input for old last name!";
        $valid = false;
    } 

    if (!$valid) {
        header("Location: membrii.php?message=" . urlencode($message));
        exit();
    }
    include "../dbConnection.php";
    $firstName = mysqli_real_escape_string($connection, $firstName);#$_REQUEST["firstName"]);
    $firstName = htmlspecialchars($firstName);
    $lastName = mysqli_real_escape_string($connection, $lastName);#$_REQUEST["lastName"]);
    $lastName = htmlspecialchars($lastName);
    $lastNameToModify = mysqli_real_escape_string($connection, $lastNameToModify);#$_REQUEST["lastNameToModify"]);
    $lastNameToModify = htmlspecialchars($lastNameToModify);

    $stmt = $connection->prepare("UPDATE membrii SET FirstName = ?, LastName = ? WHERE LastName = ?");
    $stmt->bind_param("sss", $firstName, $lastName, $lastNameToModify);
    $stmt->execute();
    if ($stmt->errno == 0) {
        $message = "Member inserted successfully.";
    } else {
        $message = "Error inserting Member: " . $connection->error;
    }

    header("Location: membrii.php?message=". urlencode($message));
    
    $connection->close();
    include "../footer/footer.php";
?>