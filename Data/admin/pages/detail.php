<!DOCTYPE html>
<html>
<head>
    <title>Item Details</title>
</head>
<body>
    <h1>Item Details</h1>

    <?php
    // Check if the 'file' parameter is provided in the URL
    if (isset($_GET['file'])) {
        // Get the filename from the URL parameter
        $filename = $_GET['file'];

        $fileInfo=pathinfo($filename);
        echo '<h3>Filename: '.$fileInfo['filename'].'</h3>';

        // Check if the file exists
        if (file_exists($filename)) {
            // Read the content of the text file
            $content = file_get_contents($filename);

            // Display the content
            echo "<pre>$content</pre>";

            // Add buttons for editing and deleting
            echo "<a href='edit.php?file=$filename'>Edit</a> ";
            echo "<a href='delete.php?file=$filename'>Delete</a>";
        } else {
            echo "<p>Item not found.</p>";
        }
    } else {
        echo "<p>Item not specified.</p>";
    }
    ?>

    <br>
    <a href="index.php">Back to Item List</a>
</body>
</html>
