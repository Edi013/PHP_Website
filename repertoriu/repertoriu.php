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
     include "displaySubjects.php";

     if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo $message;
    }
    ?>

     <!-- Add -->
    <form action="addSubject.php" method="post"><br>
        <fieldset>
            <legend>Add new subject</legend>

            <label for="name">First name:</label>
            <input type="text" id="name" name="name"><br><br>

            <input type="submit" value="Add"><br><br> 
        </fieldset>
    </form>

    <!-- Modify -->
    <form action="modifySubject.php" method="post"><br><br>
        <fieldset>
            <legend>Modify member</legend>
            <label for="oldName">Old name:</label>
            <input type="text" id="oldName" name="oldName"><br><br>
            
            <label for="newName">New name:</label>
            <input type="text" id="newName" name="newName"><br><br>

            <input type="submit" value="Modify"><br><br> 
        </fieldset>
    </form>

    <!-- Delete -->
    <form action="deleteSubject.php" method="post"><br><br>
        <fieldset>
            <legend>Delete member</legend>
            <label for="nameToDelete">Last name:</label>
            <input type="text" id="nameToDelete" name="nameToDelete"><br><br>

            <input type="submit" value="Delete"><br><br> 
        </fieldset>
    </form><br><br>
    
    <?php
         include "../footer/footer.php";
     ?>
</body>
</html>
