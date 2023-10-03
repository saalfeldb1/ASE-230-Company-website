<!DOCTYPE html>
<html>
<head>
    <title>Create File</title>
</head>
<body>
    <h1>Create New Page</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input for the title and description
        $title = $_POST["title"];
        $description = $_POST["description"];

        // make filename
        $filename = $title . '.txt';

        // Create a new text file with title and description
        $fileContent = $description;
        file_put_contents($filename, $fileContent);

        header("Location: detail.php?file=$filename");
    }
    ?>


    <form method="POST" action="">
        <label for="title">Filename:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <input type="submit" name="submit" value="Create Item">
    </form>

    <br>
    <a href="index.php">Back to Item List</a>
</body>
</html>