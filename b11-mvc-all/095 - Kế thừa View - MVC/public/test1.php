<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "../app/Database.php";
require_once "../app/models/User.php";

echo("\n<br/> test123");

$param = [
    'page'=>1,
    'limit'=>2
];

$mm = User::list($param);

echo "<pre>";
print_r($mm);
echo "</pre>";

?>