
<?php
require_once "../templates/admin/header.php"
?>

Add user ...

<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error))
    echo "<p> $error </p> ";

?>

<form action="" method="post">
    Họ: <input type="text" name='first_name' >
    <p></p>
    Tên: <input type="text" name='last_name' >
    <p></p>
    Toán: <input type="text" name='math' >
    <p></p>
    Lý: <input type="text" name='physical' >
    <p></p>
    Hóa: <input type="text" name='chemistry' >
    <p></p>
    <input type="submit">
</form>


<?php 



?>

<?php
require_once "../templates/admin/footer.php"
?>

