<!DOCTYPE html>
<html>
<head>
    <title>Award Details</title>
</head>
<body>
    <h1>Award Details</h1>

    <?php
    // Check if the CSV file exists
    if ($team = fopen("awards.csv", "r")) {
        // Get the name of the team member to display (you may pass it through URL parameters)
        $nameToDisplay = $_GET['name'];

    

        // Read each row from the CSV file
        while ($data = fgetcsv($team)) {
        
            // Extract data from the CSV row
            $award = $data[0];
            $description = $data[1];
            
            // Check if the current row matches the team member to display
            if ($award === $nameToDisplay) {
                echo "<h2>$award</h2>";
                echo "<p><strong>Description:</strong> $description</p>";
          
                // Add buttons for editing and deleting
                echo "<a href='edit.php?name=$award'>Edit</a> ";
                echo "<a href='delete.php?name=$award'>Delete</a>";

                break; // Exit the loop once the team member is found
            }
        }

        fclose($team);
    } else {
        echo "<p>No team members found.</p>";
    }
    ?>

    <br>
    <a href="index.php">Back to Awards</a>
</body>
</html>