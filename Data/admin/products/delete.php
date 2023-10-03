<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>

    <?php
    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Read the JSON data from products.json
        $jsonData = file_get_contents("products.json");
        $products = json_decode($jsonData, true);

        // Find the product to delete by ID
        $productToDelete = null;
        foreach ($products as $key => $product) {
            if ($product['id'] == $productId) {
                $productToDelete = $product;
                break;
            }
        }

        if ($productToDelete) {
            // Check if the deletion is confirmed
            if (isset($_POST['confirm'])) {
                // Remove the product from the products array
                unset($products[$key]);

                // Reindex the array to fill any gaps
                $products = array_values($products);

                // Save the updated data back to products.json
                file_put_contents("products.json", json_encode($products, JSON_PRETTY_PRINT));

                // Redirect to the product list page
                header("Location: index.php");
                exit;
            } elseif (isset($_POST['cancel'])) {
                // If the user cancels the deletion, redirect to the product detail page
                header("Location: detail.php?id=" . $productId);
                exit;
            }

            // Display a confirmation message and form
            echo "<p>Are you sure you want to delete the product: {$productToDelete['name']}?</p>";
            echo "<form method='POST' action=''>";
            echo "<input type='submit' name='confirm' value='Yes'>";
            echo "<input type='submit' name='cancel' value='No'>";
            echo "</form>";
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
