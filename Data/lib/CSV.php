<?php
//This is for reading the Awards

function loadCSVPage($page){

    $file = fopen($page . '.csv', 'r');

    
        while (($data = fgetcsv($file))) {
            if(empty(array_filter($data))){
                continue;//skip blank lines
            }
            echo $data[0].' '. $data[1].' '.'<br>';

        }

        fclose($file);
    } 

//This is for reading the Team Members



function loadCSVTeam($page){

    $file = fopen($page . '.csv', 'r');

    
        while (($data = fgetcsv($file))) {
            if(empty(array_filter($data))){
                continue;//skip blank lines
            }
            if(count($data)<4){
                continue;//skip lines with less than 4 elements
            }
            echo '<div class="col-lg-4 col-sm-6">';
                echo '<div class="team-box text-center">';
                        echo '<div class="team-wrapper">';
                        echo '<div class="team-member">';
                                echo '<img alt="" src="'.$data[3].'" class="img-fluid rounded">';
                            echo '</div>';
                        echo '</div>';
                        echo '<h4 class="team-name">'.$data[0].'</h4>';
                        echo '<p class="text-uppercase team-designation">'.$data[1].'</p>';
                        echo '<p class="text-uppercase team-designation">'.$data[2].'</p>';
                    echo '</div>';
                echo '</div>';

        }

        fclose($file);
    } 

?>

