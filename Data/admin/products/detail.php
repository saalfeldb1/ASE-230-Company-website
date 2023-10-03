<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>

    <?php
    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Read the JSON data from details.json
        $jsonData = file_get_contents("products.json");
        $products = json_decode($jsonData, true);

        // Find the product with the matching ID
        $product = null;
        foreach ($products as $productData) {
            if ($productData['id'] == $productId) {
                $product = $productData;
                break;
            }
        }

        if ($product) {
            // Display product details
            echo "<h2>{$product['name']}</h2>";
            echo "<p>Description: {$product['description']}</p>";
            echo "<p>Price: {$product['price']}</p>";
            // Add "Edit" and "Delete" buttons with links to other PHP files
            echo "<a href='edit.php?id=$productId'>Edit</a> ";
            echo "<a href='delete.php?id=$productId'>Delete</a>";
        } else {
            echo "<p>Product not found.</p>";
        }
    } else {
        echo "<p>Product ID not provided.</p>";
    }
    ?>

    <br>
    <a href="index.php">Back to Product List</a>
</body>
</html>
