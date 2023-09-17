<?php

function loadPage($page) {
    $path= 'C:/xampp/htdocs/Final/Data/'.$page.'.txt';
    $content=file_get_contents($path);
    echo $content;
}


?>