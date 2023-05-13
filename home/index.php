<?php 
    session_start();

    #Login 
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == FALSE){
        ?>
        <form action="../login/login.php" method="post">
            <fieldset>

                <legend>Credentials</legend>
                
                <label for="userName">Username:</label>
                <input type="text" id="userName" name="userName"><br><br>
                
                <label for="userPassword">Password:</label>
                <input type="password" id="userPassword" name="userPassword"><br><br>
                
                <input type = submit value = "Log in">
            </fieldset>
        </form>
        <?php
        exit;
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
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <?php
     include "../navigation-bar/navigation-bar.php";
     ?>
     <div id = "Spacing"></div>
        <h2><?php echo "Hello ".$_SESSION['userName']?></h2>
        <h3 style="padding: 15px 15px 15px 15px;">Bine ati venit pe site-ul Echipei X, Teatru Craiova!</h3>
    <?php
         include "../footer/footer.php";
     ?>
</body>
</html>
