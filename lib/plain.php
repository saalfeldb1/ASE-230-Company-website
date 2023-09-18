<?php

function loadPage($page) {
    $path= 'Data/'.$page.'.txt';
    $content=file_get_contents($path);
    echo $content;
}


?>