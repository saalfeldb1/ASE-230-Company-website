<!DOCTYPE html>
<html>
<head>
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>

    <?php
    require_once('CSVHelper.php');

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $oldName = $_GET['name']; // Get the old name from the URL
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Update the award using the CSVHelper class
        CSVHelper::updateAward($oldName, $name, $description);

        // Redirect to the index page (or wherever you want)
        header("Location: index.php");
        exit;
    } else {
        // Check if the award name is provided in the URL
        if (isset($_GET['name'])) {
            $nameToEdit = $_GET['name'];

            // Get the existing award data using the CSVHelper class
            $awards = CSVHelper::getAwards();

            // Find the award to edit
            $awardToEdit = null;
            foreach ($awards as $award) {
                if ($award[0] === $nameToEdit) {
                    $awardToEdit = $award;
                    break;
                }
            }

            if ($awardToEdit) {
                $name = $awardToEdit[0];
                $existingDescription = $awardToEdit[1];

                // Display a form with fields pre-filled with the existing data
                echo "<form method='POST' action=''>";
                echo "<label for='name'>Name:</label>";
                echo "<input type='text' id='name' name='name' value='$name' required><br>";
                echo "<label for='description'>Detailed Description:</label><br>";
                echo "<textarea id='description' name='description' rows='4' cols='50' required>$existingDescription</textarea><br>";
                echo "<input type='submit' name='save' value='Save Changes'>";
                echo "</form>";
            } else {
                echo "<p>Award not found.</p>";
            }
        } else {
            echo "<p>Invalid request.</p>";
        }
    }
    ?>

    <br>
    <a href="index.php">Back to Awards</a>
</body>
</html>
