<?php
require_once __DIR__."/../header.php"
?>

 <a href="/admin/users/add"> + Thêm </a>

 <br>

<?php
if(($_GET['act'] ?? '') == 'add') {
    require "add.php";
}
else{
    require "list.php";
}

?>



<?php
require_once __DIR__."/../footer.php"
?>

