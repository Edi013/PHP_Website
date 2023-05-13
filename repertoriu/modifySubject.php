<?php 
    include "../navigation-bar/navigation-bar.php";

    $nameToModify = "";
    $newName = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["oldName"])){
        $nameToModify = $_REQUEST["oldName"];
    }
    if(isset($_REQUEST["newName"])){
        $newName = $_REQUEST["newName"];
    }


    #validare server-side
    $valid = true;
    if(empty($nameToModify) || is_numeric($nameToModify)){
        $message =  "Invalid input for old name!";
        $valid = false;
    }
    if(empty($newName) || is_numeric($newName)){
        $message = "Invalid input for new name!";
        $valid = false;
    }


    if (!$valid) {
        header("Location: repertoriu.php?message=" . urlencode($message));
        exit();
    }

    include "../dbConnection.php";
    $nameToModify = mysqli_real_escape_string($connection, $nameToModify);#$_REQUEST["firstName"]);
    $nameToModify = htmlspecialchars($nameToModify);
    $newName = mysqli_real_escape_string($connection, $newName);#$_REQUEST["lastName"]);
    $newName = htmlspecialchars($newName);

    #verificam daca numele nou de introdus este deja existent
    $stmt = $connection->prepare("SELECT * FROM repertorii WHERE Name = ?");
    $stmt->bind_param("s", $newName);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows > 0){
        $message = "Name '$newName' is already taken.";
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #verificam daca numele vechi exista. Nu putem modifica ceva ce nu exista.
    $stmt = $connection->prepare("SELECT * FROM repertorii WHERE Name = ?");
    $stmt->bind_param("s", $nameToModify);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "None subject found to modify for Name '$nameToModify'";
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    #facem update-ul
    $stmt = $connection->prepare("UPDATE repertorii SET Name = ? WHERE Name = ?");
    $stmt->bind_param("ss", $newName, $nameToModify);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error inserting subject: " . $connection->error;
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    } 

    #totul s-a terminat cu succes
    $message = "Subject inserted successfully.";
    header("Location: repertoriu.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    include "../footer/footer.php";
?>