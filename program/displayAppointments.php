<?php 
    include "../dbConnection.php";    

    $query = "SELECT * FROM program";
    $result = $connection->query($query);

    echo "<h2>Members</h1>";
    print("<table border='1' cellspacing='0'>\n");
    print("<tr>\n");
    print("<th width='150'>Subject Name</th><th width='100'>Day</th><th width='200'>Beggining Hour</th><th width='100'>Duration (minutes)</th>");
    print("</tr>\n");
    while ($row = $result->fetch_assoc()) {
        print("<tr>\n");
        print("<td>" . $row["SubjectName"]. "</td>\n");
        print("<td>" . $row["Day"]. "</td>\n");
        print("<td>" . $row["BeginningHour"]. "</td>\n");
        print("<td>" . $row["Duration"]. "</td>\n");
        print("</tr>\n");
    }
    print("</table>");
    if ($result->num_rows == 0){
        echo "<br><b>No scheduale exists.</b><br><br>";
    }
    
    $connection->close();
?>

