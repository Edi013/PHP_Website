<?php 
        session_start();

        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == FALSE){
            header("Location: loginForm.php");
        } else {
                $user = $_SESSION['userName'];
        }
?>

<!-- After login / Home -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teatru Craiova</title>
</head>
<body>
    <?php
     include "../navigation-bar/navigation-bar.php";
    // Sectiunea cu care am inserat parola in baza de date - mysql:
    //  $admin = "admin";
    //  $pass = password_hash("admin", PASSWORD_DEFAULT);
    //  include "../dbConnection.php";
    //  $connection->execute_query("INSERT INTO credentials (Username, Password) VALUES ('$admin', '$pass')");
    ?>

    <div id = "Spacing"></div>
    <h2><?php echo "Hello ".$_SESSION['userName']?></h2>
    <h3 style="padding: 15px 15px 15px 15px;">Bine ati venit pe site-ul Echipei X, Teatru Craiova!</h3>
   
    <?php
         include "../footer/footer.php";
    ?>
</body>
</html>