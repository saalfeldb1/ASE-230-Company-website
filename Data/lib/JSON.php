<?php
//This is for reading JSON File

function loadJSONProducts($page){
    $jsonData = file_get_contents($page.'.json');
    $data = json_decode($jsonData, true);

    foreach ($data as $productName => $productData) {
        echo '<div class="col-lg-6 mt-4">';
                    echo '<div class="services-box">';
                        echo '<div class="d-flex">';
                            echo '<i class="pe-7s-diamond text-primary"></i>';
                            echo '<div class="ms-4">';
                                echo '<h3>'.$productName.'</h3>';
                                echo '<h4 class="pt-2 text-muted">'.$productData['description'] .'</h4>';
                                echo '<h4>Applications:</h4>';
                                foreach ($productData['applications'] as $applicationName => $applicationDescription) {
                                    echo '<li><strong>' . $applicationName . ':</strong> ' . $applicationDescription . '</li>';
                                }
                           echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
    }
}

?>