<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    
    <?php
    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Read the JSON data from products.json
        $jsonData = file_get_contents("products.json");
        $products = json_decode($jsonData, true);

        // Find the product by ID
        $productToUpdate = null;
        foreach ($products as $key => $product) {
            if ($product['id'] == $productId) {
                $productToUpdate = $product;
                break;
            }
        }

        if ($productToUpdate) {
            // Check if the form is submitted
            if (isset($_POST['save'])) {
                // Update the product's details
                $productToUpdate['name'] = $_POST['name'];
                $productToUpdate['description'] = $_POST['description'];
                $productToUpdate['price'] = $_POST['price'];

                // Update the product in the products array
                $products[$key] = $productToUpdate;

                // Save the updated data back to products.json
                file_put_contents("products.json", json_encode($products, JSON_PRETTY_PRINT));

                // Redirect to the detail page for the updated product
                header("Location: detail.php?id=" . $productId);
                exit;
            }

            // Display the product details in a form for editing
            echo "<form method='POST' action=''>";
            echo "<label for='name'>Name:</label>";
            echo "<input type='text' id='name' name='name' value='{$productToUpdate['name']}' required><br>";
            echo "<label for='description'>Description:</label><br>";
            echo "<textarea id='description' name='description' rows='4' cols='50' required>{$productToUpdate['description']}</textarea><br>";
            echo "<label for='price'>Price:</label>";
            echo "<input type='text' id='price' name='price' value='{$productToUpdate['price']}' required><br>";
            echo "<input type='submit' name='save' value='Save Changes'>";
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
