<?php
require_once('pages.php');

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $pages = PageManager::readPages();

    $selectedPage = null;
    foreach ($pages as $page) {
        if ($page->getTitle() === $title) {
            $selectedPage = $page;
            break;
        }
    }

    if ($selectedPage) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission for updating the page
            $newContent = $_POST['content'];
            PageManager::updatePage($title, $newContent);
            header("Location: detail.php?title=$title");
            exit;
        } else {
            echo "<h1>Update Page: {$selectedPage->getTitle()}</h1>";
            echo "<form method='post' action='update.php?title=$title'>";
            echo "<textarea name='content' rows='10' cols='50'>{$selectedPage->getContent()}</textarea><br>";
            echo "<input type='submit' value='Update Page'>";
            echo "</form>";
        }
    } else {
        echo "<p>Page not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
