<?php 
    include "../navigation-bar/navigation-bar.php";

    $nameToDelete = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["nameToDelete"])){
        $nameToDelete = $_REQUEST["nameToDelete"];
    }


    #validare server-side
    $valid = true;
    if(empty($nameToDelete) || is_numeric($nameToDelete)){
        $message = "Invalid input for name of the record to delete !";
        $valid = false;
    }

    if (!$valid) {
        header("Location: repertoriu.php?message=" . urlencode($message));
        exit();
    }

    include "../dbConnection.php";
    $nameToDelete = mysqli_real_escape_string($connection, $nameToDelete);#$_REQUEST["name$nameToDelete"]);
    $nameToDelete = htmlspecialchars($nameToDelete);
   
    #see if the name already exists in list
    $stmt = $connection->prepare("SELECT * FROM repertorii WHERE Name = ?");
    $stmt->bind_param("s", $nameToDelete);
    $stmt->execute();   
    $stmt = $stmt->get_result();
    if($stmt->num_rows != 1){
        $message = "Record with name '$nameToDelete' doesn't exists.";
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }
    $stmt->close();

    $stmt = $connection->prepare("DELETE FROM repertorii WHERE Name = ?");
    $stmt->bind_param("s", $nameToDelete);
    $stmt->execute();   
    if($stmt->error){
        $message = "Record with name '$nameToDelete' couldn't be deleted.";
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }

    $message = "Record with name '$nameToDelete' deleted.";
    header("Location: repertoriu.php?message=". urlencode($message));
    $connection->close();
    $stmt->close();
    exit();
    include "../footer/footer.php";
?>