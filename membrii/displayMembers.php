<?php 
    include "../dbConnection.php";    

    $query = "SELECT * FROM membrii";
    $result = $connection->query($query);

    echo "<h2>Members</h1>";
    print("<table border='1' cellspacing='0'>\n");
    print("<tr>\n");
    print("<th width='200'>Last Name</th><th width='200'>First Name</th>");
    print("</tr>\n");
    while ($row = $result->fetch_assoc()) {
        print("<tr>\n");
        print("<td>" . $row["LastName"]. "</td>\n");
        print("<td>" . $row["FirstName"]. "</td>\n");
        print("</tr>\n");
    }
    print("</table>");
    if ($result->num_rows == 0){
        echo "<br><b>No members exists.</b><br><br>";
    }
    
    $connection->close();
?>

