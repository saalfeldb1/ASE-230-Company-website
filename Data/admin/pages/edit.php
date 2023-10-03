<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    

    <?php
    // Check if the 'file' parameter is provided in the URL
    if (isset($_GET['file'])) {
        // Get the filename from the URL parameter
        $filename = $_GET['file'];

        $fileInfo=pathinfo($filename);
        echo '<h3>Filename: '.$fileInfo['filename'].'</h3>';

        // Check if the file exists
        if (file_exists($filename)) {
            // Check if the form is submitted to update the content
            if (isset($_POST['update'])) {
                // Get the updated content from the form
                $updatedContent = $_POST['content'];

                // Update the content of the text file
                file_put_contents($filename, $updatedContent);

                header("Location: detail.php?file=$filename");

            }

            // Read the current content of the text file
            $currentContent = file_get_contents($filename);

            // Display a form for editing the content
            echo "File Details:";
            echo "<form method='POST' action=''>";
            echo "<textarea name='content' rows='10' cols='40'>$currentContent</textarea><br>";
            echo "<input type='submit' name='update' value='Save Changes'>";
            echo "</form>";
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
