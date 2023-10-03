<!DOCTYPE html>
<html>
<head>
    <title>Delete Award</title>
</head>
<body>
    <h1>Delete Award?</h1>

    <?php
    // Check if the CSV file exists
    if (($handle = fopen("awards.csv", "r")) !== false) {
        // Get the name of the team member to delete (you may pass it through URL parameters)
        $nameToDelete = $_GET['name'];


        // Read each row from the CSV file
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
           
            // Extract data from the CSV row
            $name = $data[0];

            // Check if the current row matches the team member to delete
            if ($name === $nameToDelete) {
                // Display a confirmation message and form
                echo "<p>Are you sure you want to delete the team member:$name?</p>";
                echo "<form method='POST' action=''>";
                echo "<input type='submit' name='confirm' value='Yes'>";
                echo "<input type='submit' name='cancel' value='No'>";
                echo "</form>";

                break; // Exit the loop once the team member is found
            }
        }

        fclose($handle);
    } else {
        echo "<p>Error: Unable to open the file.</p>";
    }

    // Check if the user confirmed the deletion
    if (isset($_POST["confirm"])) {
        // Read the entire CSV file into an array
        $csvData = array_map('str_getcsv', file('awards.csv'));

        // Find the row to delete based on the team member's name
        foreach ($csvData as $key => $row) {
            if ($row[0] === $nameToDelete) {
                unset($csvData[$key]); // Remove the matching row
                break; // Exit the loop once the team member is deleted
            }
        }

        // Write the updated data back to the CSV file
        $csvFile = fopen("awards.csv", "w");
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
