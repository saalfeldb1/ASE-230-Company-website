<?php
// code for retrieving and showing a specific item from team.csv
// code for creating a button that links to edit.php
// code for creating a button that links to delete.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Team Member Details</title>
</head>
<body>
    <h1>Team Member Details</h1>

    <?php
    // Check if the CSV file exists
    if ($team = fopen("team.csv", "r")) {
        // Get the name of the team member to display (you may pass it through URL parameters)
        $nameToDisplay = $_GET['name'];

    

        // Read each row from the CSV file
        while ($data = fgetcsv($team)) {
        
            // Extract data from the CSV row
            $name = $data[0];
            $position = $data[1];
            $email = $data[2];

            // Check if the current row matches the team member to display
            if ($name === $nameToDisplay) {
                echo "<h2>$name</h2>";
                echo "<p><strong>Position:</strong> $position</p>";
                echo "<p><strong>Email:</strong>$email</p>";

                // Add buttons for editing and deleting
                echo "<a href='edit.php?name=$name'>Edit</a> ";
                echo "<a href='delete.php?name=$name'>Delete</a>";

                break; // Exit the loop once the team member is found
            }
        }

        fclose($team);
    } else {
        echo "<p>No team members found.</p>";
    }
    ?>

    <br>
    <a href="index.php">Back to Team Members</a>
</body>
</html>