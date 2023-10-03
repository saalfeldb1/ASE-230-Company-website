<!DOCTYPE html>
<html>
<head>
    <title>Add Award</title>
</head>
<body>
    <h1>Add New Award</h1>
    
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $position = $_POST["description"];

        // Check if the CSV file exists
        if (($handle = fopen("awards.csv", "a")) !== false) {
            // Create a new row in the CSV file with the submitted data
            fputcsv($handle, [$name, $position, $email]);
            
            fclose($handle);

            // Redirect to the edit page for the newly created team member
            header("Location: edit.php?name={$name}");
            exit;
        } else {
            echo "<p>Error: Unable to open the file.</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Detailed Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Create Award">
    </form>

    <br>
    <a href="index.php">Back to Awards</a>
</body>
</html>