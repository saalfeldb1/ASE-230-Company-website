<?php
// Include the Page and PageManager classes from your code
require_once('pages.php');

// Check if the 'title' parameter is provided in the URL
if (isset($_GET['title'])) {
    // Retrieve the title from the query parameter
    $title = $_GET['title'];

    // Use PageManager to get the content of the specified page
    $pages = PageManager::readPages();

    // Find the page with the matching title
    $selectedPage = null;
    foreach ($pages as $page) {
        if ($page->getTitle() === $title) {
            $selectedPage = $page;
            break;
        }
    }

    if ($selectedPage) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission for confirming the page deletion
            PageManager::deletePage($title);

            // Redirect back to index.php after deletion
            header("Location: index.php");
            exit;
        } else {
            // Display a confirmation form for deleting the page
            echo "<h1>Delete Page: {$selectedPage->getTitle()}</h1>";
            echo "<p>Are you sure you want to delete this page?</p>";
            echo "<form method='post'>";
            echo "<input type='submit' value='Confirm Deletion'>";
            echo "</form>";
        }
    } else {
        // Handle the case where the title does not match any pages
        echo "<p>Page not found.</p>";
    }
} else {
    // Handle the case where the 'title' parameter is not provided
    echo "<p>Invalid request.</p>";
}
?>
