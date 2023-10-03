<!DOCTYPE html>
<html>
<head>
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>
    
    <?php
    // Check if the CSV file exists
    if (($handle = fopen("awards.csv", "r")) !== false) {
        // Get the name of the team member to edit (you may pass it through URL parameters)
        $nameToEdit = $_GET['name'];

        // Initialize variables to store existing data
        $existingAward = "";
        $existingDescription = "";

        // Read each line from the CSV file
        while (($line = fgets($handle)) !== false) {
            // Split the line into an array based on the CSV delimiter (comma)
            $data = str_getcsv($line);

            // Check if the current row matches the team member to edit
            if ($data[0] === $nameToEdit) {
                // Store existing data
                $existingAward = $data[0];
                $existingDescription = $data[1];
              
                // Display a form with fields pre-filled with the existing data
                echo "<form method='POST' action=''>";
                echo "<label for='name'>Name:</label>";
                echo "<input type='text' id='name' name='name' value='$existingAward' required><br>";
                echo "<label for='description'>Detailed Description:</label><br>";
                echo "<textarea id='description' name='description' rows='4' cols='50' required>$existingDescription</textarea><br>";
                echo "<input type='submit' name='save' value='Save Changes'>";
                echo "</form>";

                break; // Exit the loop once the team member is found
            }
        }

        fclose($handle);
    } else {
        echo "<p>Error: Unable to open the CSV file.</p>";
    }

    // Check if the form is submitted
    if (isset($_POST["save"])) {
        // Retrieve updated data from the form
        $updatedName = $_POST["name"];
        $updatedPosition = $_POST["description"];

        // Read the entire CSV file into an array
        $csvData = file("awards.csv");

        // Open the CSV file for writing
        $csvFile = fopen("awards.csv", "w");

        // Iterate through each line in the CSV data
        foreach ($csvData as $line) {
            $data = str_getcsv($line);

            // Check if the current row matches the team member to edit
            if ($data[0] === $nameToEdit) {
                // Update the data
                $data[0] = $updatedName;
                $data[1] = $updatedPosition;
                $data[2] = $updatedEmail;
            }

            // Write the updated or original line back to the CSV file
            fputcsv($csvFile, $data);
        }

        fclose($csvFile);

        // Redirect to the index page
        header("Location: index.php");
        exit;
    }
    ?>

    <br>
    <a href="index.php">Back to Awards</a>
</body>
</html>
