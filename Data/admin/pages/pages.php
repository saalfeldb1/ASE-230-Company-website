<?php
class Page {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}

class PageManager {
    public static function createPage($title, $content) {
        // Create a new Page object
        $page = new Page($title, $content);
        
        // Save the page data to a text file
        $filename = strtolower(str_replace(' ', '_', $title)) . '.txt';
        file_put_contents($filename, $content);
    }

    public static function readPages() {
        // Get a list of all text files in the current directory
        $files = glob("*.txt");

        $pages = [];

        foreach ($files as $file) {
            $title = ucfirst(str_replace('_', ' ', pathinfo($file, PATHINFO_FILENAME)));
            $content = file_get_contents($file);

            // Create Page objects and add them to the array
            $pages[] = new Page($title, $content);
        }

        return $pages;
    }

    public static function updatePage($title, $newContent) {
        $filename = strtolower(str_replace(' ', '_', $title)) . '.txt';

        if (file_exists($filename)) {
            // Update the content of the text file
            file_put_contents($filename, $newContent);
        }
    }

    public static function deletePage($title) {
        $filename = strtolower(str_replace(' ', '_', $title)) . '.txt';

        if (file_exists($filename)) {
            // Delete the text file
            unlink($filename);
        }
    }
}



?>