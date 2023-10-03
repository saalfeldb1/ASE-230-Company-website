<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        
        <?php
        // Read the JSON data from products.json
        $jsonData = file_get_contents("products.json");
        $products = json_decode($jsonData, true);

        // Check if products exist
        if (is_array($products)) {
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>{$product['description']}</td>";
                echo "<td>{$product['price']}</td>";
                echo "<td><a href='detail.php?id={$product['id']}'>Detail</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No products found.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="create.php">Create New Product</a>
</body>
</html>
