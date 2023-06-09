<?php
include "../login/checkLoginStatus.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teatru Craiova</title>
    <script src="validate.js" type="text/javascript"></script>
    
</head>
<body>
    <?php
     include "../navigation-bar/navigation-bar.php";
     include "displayMembers.php";

     if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo $message;
    }
    ?>

     <!-- Add -->
    <form name = "addMember" onsubmit="return validateAdd()" action="addMember.php" method="post" ><br>
        <fieldset>
            <legend>Add new member</legend>
            <label for="firstName">First name:</label>
            <input type="text" id="firstName" name="firstName"><br><br>
            
            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="lastName"><br><br>

            <input type="submit" value="Add"><br><br> 
        </fieldset>
    </form>

    <!-- Modify -->
    <form name = "modifyMember" onsubmit="return validateModify()" action="modifyMember.php" method="post"><br><br>
        <fieldset>
            <legend>Modify member</legend>
            <label for="lastNameToModify">Old last name:</label>
            <input type="text" id="lastNameToModify" name="lastNameToModify"><br><br>

            <label for="newFirstName">New first name:</label>
            <input type="text" id="newFirstName" name="newFirstName"><br><br>
            
            <label for="newLastName">New last name:</label>
            <input type="text" id="newLastName" name="newLastName"><br><br>

            <input type="submit" value="Modify"><br><br> 
        </fieldset>
    </form>

    <!-- Delete -->
    <form name = "deleteMember" onsubmit="return validateDelete()" action="deleteMember.php" method="post"><br><br>
        <fieldset>
            <legend>Delete member</legend>
            <label for="lastNameToDelete">Last name:</label>
            <input type="text" id="lastNameToDelete" name="lastNameToDelete"><br><br>

            <input type="submit" value="Delete"><br><br> 
        </fieldset>
    </form><br>
    <br>
    <?php
         include "../footer/footer.php";
     ?>
</body>
</html>
