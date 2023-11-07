<!DOCTYPE html>
<html>
<head>
    <title>Add Award</title>
</head>
<body>
    <h1>Add New Award</h1>
    
    <?php
    require_once('CSVHelper.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $description = $_POST["description"];

        // Create a new award
        CSVHelper::createAward($name, $description);

        // Redirect to the awards list
        header("Location: index.php");
        exit;
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
