<?php
class CSVHelper {
    public static function createAward($title, $description) {
        $data = [$title, $description];
        $csvFile = 'awards.csv';  
    
        // Open the CSV file for writing
        $file = fopen($csvFile, 'a');
        fputcsv($file, $data);
        fclose($file);
    }
    

    public static function getAwards() {
        $awards = [];
        $csvFile = 'awards.csv';  
    
        // Open the CSV file for reading
        $file = fopen($csvFile, 'r');
        while (($data = fgetcsv($file)) !== false) {
            $awards[] = $data;
        }
        fclose($file);
    
        return $awards;
    }
    

    public static function updateAward($title, $newname, $description) {
        $csvFile = 'awards.csv';  
        // Read the existing awards from the CSV file
        $awards = self::getAwards();
    
        foreach ($awards as &$award) {
            if ($award[0] == $title) {
                $award[0] = $newname; 
                $award[1] = $description;
                
                break;
            }
        }
    
        // Write the updated awards back to the CSV file
        $file = fopen($csvFile, 'w');
        foreach ($awards as $data) {
            fputcsv($file, $data);
        }
        fclose($file);
    }
    
    

    public static function deleteAward($name) {
        $csvFile = 'awards.csv'; 
    
        // Read the existing awards from the CSV file
        $awards = self::getAwards();
   
        foreach ($awards as $key => $award) {
            if ($award[0] == $name) {  
                unset($awards[$key]);
                break;
            }
        }
    
        // Write the remaining awards back to the CSV file
        $file = fopen($csvFile, 'w');
        foreach ($awards as $data) {
            fputcsv($file, $data);
        }
        fclose($file);
    }
    
}
