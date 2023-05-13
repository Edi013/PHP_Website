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

    #verificam daca numele nou de introdus este deja existent
    $stmt = $connection->prepare("Select * FROM membrii WHERE LastName = ?");
    $stmt->bind_param("s", $lastName);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows > 0){
        $message = "Name '$lastName' is already taken.";
        header("Location: membrii.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #verificam daca numele vechi exista. Nu putem modifica ceva ce nu exista.
    $stmt = $connection->prepare("Select * FROM membrii WHERE LastName = ?");
    $stmt->bind_param("s", $lastNameToModify);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "None member found to modify for Last Name = '$lastNameToModify'";
        header("Location: membrii.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #facem update-ul
    $stmt = $connection->prepare("UPDATE membrii SET FirstName = ?, LastName = ? WHERE LastName = ?");
    $stmt->bind_param("sss", $firstName, $lastName, $lastNameToModify);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error inserting Member: " . $connection->error;
        header("Location: membrii.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    } 

    #totul s-a terminat cu succes
    $message = "Member inserted successfully.";
    header("Location: membrii.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    include "../footer/footer.php";
?>