<?php

$email = "abc123@sd.sd.com"; 
$regex = '/^([a-z0-9]+)@([\da-z\.-]+)\.([a-z]{2,6})$/ '; 
if (preg_match($regex, $email))
echo $email . " is a valid email. We can accept it.";
else
echo $email . " is an invalid email. Please try again.";
