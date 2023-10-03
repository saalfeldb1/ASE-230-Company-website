<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
    <h1>Plain text pages</h1>

    <?php
    // Get a list of all text files in the current directory
    $files = glob("*.txt");

    if (empty($files)) {
        echo "<p>No items found.</p>";
    } else {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Filename</th>";
        echo "<th>Preview</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        foreach ($files as $file) {
            // Extract the title (filename) from the filename
            $title = ucfirst(str_replace('_', ' ', pathinfo($file, PATHINFO_FILENAME)));

            // Read the first couple of words from the file's content
            $content = file_get_contents($file);
            $preview = implode(' ', array_slice(str_word_count($content, 1), 0, 3));

            echo "<tr>";
            echo "<td>$title</td>";
            echo "<td>$preview</td>";
            echo "<td><a href='detail.php?file=$file'>Details</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

    <br>
    <a href="create.php">Create New Item</a>
</body>
</html>
