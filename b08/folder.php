<?php
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

$dir = __DIR__;

echo "Current folder: ".$dir;

$files1 = scandir($dir);
$files2 = scandir($dir, 
SCANDIR_SORT_DESCENDING);

echo '<pre>';
print_r($files1);
echo '</pre>';

foreach($files1 AS $fname){
    if(is_file(__DIR__ . "/$fname")){
        echo "<br> File: $fname";
    }
    else{

        echo "<br> DIR: $fname";
        $files3 = scandir(__DIR__ . "/$fname", 
      SCANDIR_SORT_DESCENDING);

        echo '<pre>';
        print_r($files3);
        echo '</pre>';
        
    }
}


