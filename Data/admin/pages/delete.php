<!DOCTYPE html>
<html>
<head>
    <title>Delete Item</title>
</head>
<body>
    <h1>Delete Item</h1>

    <?php
    // Check if the 'file' parameter is provided in the URL
    if (isset($_GET['file'])) {
        // Get the filename from the URL parameter
        $filename = $_GET['file'];

        // Check if the file exists
        if (file_exists($filename)) {
            // Check if the form is submitted to confirm deletion
            if (isset($_POST['confirm'])) {
                // Delete the file
                unlink($filename);
                
                header("Location: index.php");

            } elseif (isset($_POST['cancel'])) {
                // If the user cancels the deletion, redirect to the detail page
                header("Location: detail.php?file=$filename");
                exit; // Make sure to exit after performing the redirection
            } else {
                // Display a confirmation message and form
                echo "<p>Are you sure you want to delete this item?</p>";
                echo "<form method='POST' action=''>";
                echo "<input type='submit' name='confirm' value='Yes'>";
                echo "<input type='submit' name='cancel' value='No'>";
                echo "</form>";
            }
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
