<!DOCTYPE html>
<html>
<head>
    <title>Create New Product</title>
</head>
<body>
    <h1>Create New Product</h1>
    
    <?php
    // Initialize variables to hold form data
    $name = "";
    $description = "";
    $price = "";

    // Check if the form is submitted
    if (isset($_POST['create'])) {
        // Get user input from the form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Read the existing products from products.json
        $jsonData = file_get_contents("products.json");
        $products = json_decode($jsonData, true);

        // Generate a new product ID (you can use a more robust method)
        $newProductId = count($products) + 1;

        // Create a new product array
        $newProduct = [
            "id" => $newProductId,
            "name" => $name,
            "description" => $description,
            "price" => $price
        ];

        // Add the new product to the existing list
        $products[] = $newProduct;

        // Save the updated data back to products.json
        file_put_contents("products.json", json_encode($products, JSON_PRETTY_PRINT));

        // Redirect to the detail page for the newly created product
        header("Location: detail.php?id=" . $newProductId);
        exit;
    }
    ?>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo $description; ?></textarea><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>" required><br>

        <input type="submit" name="create" value="Create Product">
    </form>

    <br>
    <a href="index.php">Back to Product List</a>
</body>
</html>
