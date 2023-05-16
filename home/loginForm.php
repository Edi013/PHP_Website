<?php 
    session_start();

    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        echo "<br><br>";
    }
?>


<html>
    <body>
        <script src="validate.js" type="text/javascript"></script>

        <form name="Login" onsubmit="return validateLogin()" action="../login/login.php" method="post">
            <fieldset>
                <legend>Credentials</legend>
                
                <label for="userName">Username:</label>
                <input type="text" id="userName" name="userName"><br><br>
                
                <label for="userPassword">Password:</label>
                <input type="password" id="userPassword" name="userPassword"><br><br>
                
                <input type="submit" value="Login">
            </fieldset>
        </form>
    </body>
</html>