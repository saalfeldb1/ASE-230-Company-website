<?php
// code for creating a form that enables user to create new item
// code for adding new item to database
// code for redirecting user to edit.php after submitting form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Team Member</title>
</head>
<body>
    <h1>Create Team Member</h1>
    
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $position = $_POST["position"];
        $email = $_POST["email"];

        // Check if the CSV file exists
        if (($handle = fopen("team.csv", "a")) !== false) {
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

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Create Team Member">
    </form>

    <br>
    <a href="index.php">Back to Team Members</a>
</body>
</html>