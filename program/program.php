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
     include "displayAppointments.php";

     if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo $message;
    }
    ?>

     <!-- Add -->
    <form action="addAppointment.php" method="post"><br>
        <fieldset>
            <legend>Add new appointment</legend>
            <label for="name">Subject name:</label>
            <input type="text" id="name" name="name"><br><br>
            
            <label for="day">Day:</label>
            <input type="text" id="day" name="day"><br><br>

            <label for="beginningHour">Begining hour :</label>
            <input type="text" id="beginningHour" name="beginningHour"><br><br>

            <label for="duration">Durata:</label>
            <input type="text" id="duration" name="duration"><br><br>

            <input type="submit" value="Add"><br><br> 
        </fieldset>
    </form>

    <!-- Modify -->
    <form action="modifyAppointment.php" method="post"><br><br>
        <fieldset>
            <legend>Modify appointment</legend>
            <label for="oldBeginningHour">Old begining hour :</label>
            <input type="text" id="oldBeginningHour" name="oldBeginningHour"><br><br>

            <label for="newBeginningHour">New begining hour :</label>
            <input type="text" id="newBeginningHour" name="newBeginningHour"><br><br>

            <label for="oldDay">Old day :</label>
            <input type="text" id="oldDay" name="oldDay"><br><br>

            <label for="newDay">New day :</label>
            <input type="text" id="newDay" name="newDay"><br><br>

            <input type="submit" value="Modify"><br><br> 
        </fieldset>
    </form>

    <!-- Delete -->
    <form action="deleteAppointment.php" method="post"><br><br>
        <fieldset>
            <legend>Delete appointment</legend>
            <label for="beginningHourToDelete">Begining hour :</label>
            <input type="text" id="beginningHourToDelete" name="beginningHourToDelete"><br><br>

            <label for="dayToDelete">Day :</label>
            <input type="text" id="dayToDelete" name="dayToDelete"><br><br>

            <input type="submit" value="Delete"><br><br> 
        </fieldset>
    </form><br><br>

    <?php
         include "../footer/footer.php";
     ?>
</body>
</html>
