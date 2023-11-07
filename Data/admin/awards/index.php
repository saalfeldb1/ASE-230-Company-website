<!DOCTYPE html>
<html>
<head>
    <title>Awards</title>
</head>
<body>
    <h1>Our Awards</h1>
    
    <table border="1">
        <tr>
            <th>Award Name</th>
            <th>Description</th>
            <th>Action</th> <!-- Add a new column for the "Details" button -->
        </tr>
        
        <?php
        require_once('CSVHelper.php');
        
        // Get a list of awards
        $awards = CSVHelper::getAwards();

        foreach ($awards as $award) {
            echo "<tr>";
            echo "<td>{$award[0]}</td>"; 
            echo "<td>{$award[1]}</td>"; 
            echo "<td><a href='detail.php?name={$award[0]}'>Details</a></td>"; 
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="create.php">Create New Award</a></br>
    <a href="../admin.php">Go to Admin Dashboard</a></br>
</body>
</html>
