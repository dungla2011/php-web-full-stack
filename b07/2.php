<?php

$cookie_name = "user3";
$cookie_value = "John Doe";
setcookie($cookie_name, 
$cookie_value, 
time() + (86400 * 30), 
"/"); // 86400 = 1 day
?>
<html>
<body>

<?php

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';


if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>
