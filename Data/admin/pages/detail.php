<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
      <?php
    require_once('pages.php');

    // Check if the 'title' parameter is provided in the URL
    if (isset($_GET['title'])) {
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
            // Display the details of the selected page
            echo "<h1>Filename: {$selectedPage->getTitle()}</h1>";
            echo "<p>{$selectedPage->getContent()}</p>";

            // Add links to update and delete this specific page
            echo "<a href='update.php?title={$selectedPage->getTitle()}'>Update </a>";
            echo "<a href='delete.php?title={$selectedPage->getTitle()}'>Delete</a>";
        } else {
            // Handle the case where the title does not match any pages
            echo "<p>Page not found.</p>";
        }
    } else {
        // Handle the case where the 'title' parameter is not provided
        echo "<p>Invalid request.</p>";
    }
    ?>

    <br>
    <a href="index.php">Go to Pages Dashboard</a>
</body>
</html>