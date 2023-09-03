<?php

ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

function exclaim($str) {
    return $str . " 123 ";
  }
  
  function ask($str) {
    return $str . " 456";
  }
  
  function printFormatted($str, $format) {
    // Calling the $format callback function
    echo $format($str);
  }
  
  // Pass "exclaim" and "ask" as callback functions to printFormatted()
printFormatted("<br>Hello world", "exclaim");

printFormatted("<br>Hello world", "ask");
  
