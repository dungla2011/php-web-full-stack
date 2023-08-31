<?php 
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  
?>
<html>
<body>
<?php
require "header.php"
?>
<hr>
<?php
if(isset($_GET['page']) && $_GET['page'] == 'news')
{
  require("news.php");
}
if(isset($_GET['page']) 
&& $_GET['page'] == 'product')
{
  require("product.php");
}
else{
?>

<h1>Welcome to my home page!</h1>
<p>Some text.</p>
<p>Some more text.</p>

<?php
}
?>

<hr>
<?php require_once 'footer.php';?>

</body>
</html>
