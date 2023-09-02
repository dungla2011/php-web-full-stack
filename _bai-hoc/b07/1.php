<?php

$fileName = "1.txt";
$myfile = fopen($fileName, "r") or die("Unable to open file!");

$fileSize = filesize($fileName);
$totalRead = 0;
while($totalRead <= $fileSize){
    $buff = fread($myfile,1000);
    $totalRead+=strlen($buff);
    //echo $buff;
    usleep(1);
}

fclose($myfile);

?>

