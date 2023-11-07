<!DOCTYPE html>
<html>
<head>
    <title>Delete Award</title>
</head>
<body>
    <h1>Delete Award?</h1>

    <?php
    require_once('CSVHelper.php');

    // Get the name of the award to delete from URL parameters
    $nameToDelete = $_GET['name'];

    // Check if the award exists and confirm deletion
    
        echo "<p>Are you sure you want to delete the award: $nameToDelete?</p>";
        echo "<form method='POST' action=''>";
        echo "<input type='submit' name='confirm' value='Yes'>";
        echo "<input type='submit' name='cancel' value='No'>";
        echo "</form>";
    

    // Check if the user confirmed or canceled the deletion
    if (isset($_POST["confirm"])) {
        // Delete the award
        CSVHelper::deleteAward($nameToDelete);
        // Redirect to the awards list (index.php)
        header("Location: index.php");
        exit;
    } elseif (isset($_POST["cancel"])) {
        // If the user cancels the deletion, redirect to the awards list (index.php)
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>
