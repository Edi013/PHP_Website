<?php 
    include "../navigation-bar/navigation-bar.php";

    $firstName = "";
    $lastName = "";

    # preluam informatia introdusa de utilizator 
    if(isset($_REQUEST["firstName"])){
        $lastName = $_REQUEST["firstName"];
    }
    if(isset($_REQUEST["lastName"])){
        $lastName = $_REQUEST["lastName"];
    }

    #validare server-side
    $valid = true;
    if(empty($firstName)  || is_numeric($firstName) ){
        echo "Invalid input for first name!";
        $valid = false;
    }
    if(empty($lastName) || is_numeric($lastName)){
        echo "Invalid input for last name!";
        $valid = false;
    }   
    #daca exista deja, exit()
    

   include "../footer/footer.php";
?>