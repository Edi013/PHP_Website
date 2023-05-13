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
     
     <!-- Add -->
    <form action="addMember.php" method="post"><br>
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
    <form action="modifyMember.php" method="post"><br><br>
        <fieldset>
            <legend>Modify member</legend>
            <label for="firstName">First name:</label>
            <input type="text" id="firstName" name="firstName"><br><br>
            
            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="lastName"><br><br>

            <input type="submit" value="Modify"><br><br> 
        </fieldset>
    </form>

    <!-- Delete -->
    <form action="deleteMember.php" method="post"><br><br>
        <fieldset>
            <legend>Delete member</legend>
            <label for="firstName">First name:</label>
            <input type="text" id="firstName" name="firstName"><br><br>
            
            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="lastName"><br><br>

            <input type="submit" value="Delete"><br><br> 
        </fieldset>
    </form>

    <?php
         include "../footer/footer.php";
     ?>
</body>
</html>
