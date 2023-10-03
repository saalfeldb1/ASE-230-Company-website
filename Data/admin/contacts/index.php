<!DOCTYPE html>
<html>
<head>
    <title>Contact Requests</title>
</head>
<body>
    <h1>Contact Requests</h1>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>

        <?php
        // Read the CSV file and display contact requests in a table
        if ($handle = fopen("contacts.csv", "r")) {
            $rowCounter = 0; // To skip the header row

            while ($data = fgetcsv($handle)) {

                $name = $data[0];
                $email = $data[1];
                $subject = $data[2];

                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$subject</td>";
                echo "<td><a href='detail.php?id=$rowCounter'>View Details</a></td>";
                echo "</tr>";

                $rowCounter++;
            }

            fclose($handle);
        } else {
            echo "<tr><td colspan='4'>No contact requests found.</td></tr>";
        }
        ?>
  
    </table>
    <a href="../admin.php">Go to Admin Dashboard</a></br>
</body>
</html>
