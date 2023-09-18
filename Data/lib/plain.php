<?php

function loadPlainPage($page) {
    $path= $page.'.txt';
    $content=file_get_contents($path);
    echo $content;
}


?>