<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>
</head>
<body>
    <h1>Team Members</h1>
    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        
        <?php
        // Check if the CSV file exists
        if ($team = fopen("team.csv", "r")) {
           

            // Read each row from the CSV file
            while ($data = fgetcsv($team)) {            

                // Extract data from the CSV row
                $name = $data[0];
                $position = $data[1];
                $email = $data[2];

                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$position</td>";
                echo "<td>$email</td>";
                echo "<td><a href='detail.php?name=$name'>Edit</a></td>";
                echo "</tr>";
            }

            fclose($team);
        } else {
            echo "<tr><td colspan='4'>No team members found.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="create.php">Create New Team Member</a></br>
    <a href="../admin.php">Go to Admin Dashboard</a></br>
</body>
</html>