<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
    <h1>Pages</h1>

    <?php
    require_once('pages.php');
    // Create a new page
PageManager::createPage("About Us", "Welcome to our About Us page.");

// Read and display pages
$pages = PageManager::readPages();

if (empty($pages)) {
    echo "<p>No items found.</p>";
} else {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Preview</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    foreach ($pages as $page) {
        echo "<tr>";
        echo "<td>{$page->getTitle()}</td>";
        echo "<td>" . substr($page->getContent(), 0, 50) . "...</td>";
        echo "<td><a href='detail.php?title={$page->getTitle()}'>Details</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Provide links for CRUD operations
echo '<br><a href="create.php">Create New Page</a></br>';
echo '<a href="../admin.php">Go to Admin Dashboard</a></br>';
    ?>

    <br>
  
</body>
</html>
