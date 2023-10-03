

<!DOCTYPE html>
<html>
<head>
    <title>Delete Team Member</title>
</head>
<body>
    <h1>Delete Team Member</h1>

    <?php
    // Check if the CSV file exists
    if (($handle = fopen("team.csv", "r")) !== false) {
        // Get the name of the team member to delete (you may pass it through URL parameters)
        $nameToDelete = $_GET['name'];

        // Initialize a variable to skip the header row
        $skipHeader = true;

        // Read each row from the CSV file
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            // Skip the header row
            if ($skipHeader) {
                $skipHeader = false;
                continue;
            }

            // Extract data from the CSV row
            $name = $data[0];

            // Check if the current row matches the team member to delete
            if ($name === $nameToDelete) {
                // Display a confirmation message and form
                echo "<p>Are you sure you want to delete the team member: {$name}?</p>";
                echo "<form method='POST' action=''>";
                echo "<input type='submit' name='confirm' value='Yes'>";
                echo "<input type='submit' name='cancel' value='No'>";
                echo "</form>";

                break; // Exit the loop once the team member is found
            }
        }

        fclose($handle);
    } else {
        echo "<p>Error: Unable to open the CSV file.</p>";
    }

    // Check if the user confirmed the deletion
    if (isset($_POST["confirm"])) {
        // Read the entire CSV file into an array
        $csvData = array_map('str_getcsv', file('team.csv'));

        // Find the row to delete based on the team member's name
        foreach ($csvData as $key => $row) {
            if ($row[0] === $nameToDelete) {
                unset($csvData[$key]); // Remove the matching row
                break; // Exit the loop once the team member is deleted
            }
        }

        // Write the updated data back to the CSV file
        $csvFile = fopen("team.csv", "w");
        foreach ($csvData as $row) {
            fputcsv($csvFile, $row);
        }
        fclose($csvFile);

        // Redirect to the index page
        header("Location: index.php");
        exit;
    } elseif (isset($_POST["cancel"])) {
        // If the user cancels the deletion, redirect to the index page
        header("Location: index.php");
        exit;
    }
    ?>
    
    
</body>
</html>
