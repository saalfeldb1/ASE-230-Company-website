<!DOCTYPE html>
<html>
<head>
    <title>Contact Request Details</title>
</head>
<body>
    <h1>Contact Request Details</h1>

    <?php
    // Check if the 'id' parameter is provided in the URL
    if (isset($_GET['id'])) {
        $contactId = $_GET['id'];

        // Read the CSV file again and display the details of the selected contact request
        if (($handle = fopen("contacts.csv", "r")) !== false) {
            $rowCounter = 0; // To skip the header row

            while (($data = fgetcsv($handle)) !== false) {

                if ($rowCounter == $contactId) {
                    $name = $data[0];
                    $email = $data[1];
                    $subject = $data[2];
                    $information = $data[3];

                    echo "<p><strong>Name:</strong> $name</p>";
                    echo "<p><strong>Email:</strong> $email</p>";
                    echo "<p><strong>Subject:</strong> $subject</p>";
                    echo "<p><strong>Subject:</strong> $information</p>";
                    break; // Exit the loop once the contact request is found
                }

                $rowCounter++;
            }

            fclose($handle);
        } else {
            echo "<p>Error: Unable to open the CSV file.</p>";
        }
    } else {
        echo "<p>Contact request ID not provided.</p>";
    }
    ?>

    <br>
    <a href="index.php">Back to Contact Requests</a>
</body>
</html>
