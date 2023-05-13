<?php 
    include "../navigation-bar/navigation-bar.php";

    $name = "";
    $message = "";
    
    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["name"])){
        $name = $_REQUEST["name"];
    }

    #validare server-side
    $valid = true;
    if(empty($name) || is_numeric($name)){
        $message =  "Invalid input for name!";
        $valid = false;
    }

    include "../dbConnection.php";
    $name = mysqli_real_escape_string($connection, $name);
    $name = htmlspecialchars($name);

    #verificam daca deja exista un astfel de nume
    $result = $connection->prepare("SELECT * FROM repertorii WHERE  Name = ?");
    $result->bind_param("s", $name);
    $result->execute();    
    $result = $result->get_result();
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        if($row["Name"] == $name)
        {
            $valid = false;
            $message =  "Subject with name '$name' is already inserted.";
        }
    }
    $result->close();

    if (!$valid) {
        header("Location: repertoriu.php?message=" . urlencode($message));
        $connection->close();
        exit();
    }

    #inseram noul repertoriu
    $stmt = $connection->prepare("INSERT INTO repertorii (Name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    if ($stmt->errno != 0) {
        $message = "Error inserting subject: " . $connection->error;
        header("Location: repertoriu.php?message=". urlencode($message));
        $connection->close();
        $stmt->close();
        exit();
    }    
    $message = "Subject inserted successfully.";
    header("Location: repertoriu.php?message=". urlencode($message));
    $connection->close();
    include "../footer/footer.php";
?>