<!DOCTYPE html>
<html>
<head>
    <title>Awards</title>
</head>
<body>
    <h1>Our Awards</h1>
    
    <table >
        <tr>
            <th>Award Name</th>
            <th>Description</th>
           
        </tr>
        
        <?php
        // Check if the CSV file exists
        if ($team = fopen("awards.csv", "r")) {
           

            // Read each row from the CSV file
            while ($data = fgetcsv($team)) {            

                // Extract data from the CSV row
                $name = $data[0];
                $description = $data[1];
              

                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$description</td>";
                echo "<td><a href='detail.php?name=$name'>Edit</a></td>";
                echo "</tr>";
            }
            fclose($team);
        } else {
            echo "<tr><td colspan='4'>No awards found.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="create.php">Create New Award</a></br>
    <a href="../admin.php">Go to Admin Dashboard</a></br>
</body>
</html>