<?php

ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

function divide($dividend, $divisor) {
    if($divisor == 0) {
//        die("Chia 0");
        throw new 
        Exception("Division by zero123");
    }
    return $dividend / $divisor;
}

try {
    echo divide(5, 0);
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';    
    echo " --> Unable to divide: " . $e->getMessage();
}


echo "<br>...ABC";

