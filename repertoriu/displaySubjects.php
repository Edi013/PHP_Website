<?php 
    include "../dbConnection.php";    

    $query = "SELECT * FROM repertorii";
    $result = $connection->query($query);

    echo "<h2>Subjects</h1>";
    print("<table border='1' cellspacing='0'>\n");
    print("<tr>\n");
    print("<th width='400'>Name</th>");
    print("</tr>\n");
    while ($row = $result->fetch_assoc()) {
        print("<tr>\n");
        print("<td>" . $row["Name"]. "</td>\n");
        print("</tr>\n");
    }
    print("</table>");
    if ($result->num_rows == 0){
        echo "<br><b>No subjects exists.</b><br><br>";
    }
    
    $connection->close();
?>

