
<?php
require_once "../templates/admin/header.php"
?>

Add Product:

<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

?>

<form action="" method="post">

    Tên sản phẩm: <input type="text" name='name' >
    <p></p>
    Giá: <input type="text" name='price' >
    <p></p>
    Mô tả: <input type="text" name='description' >
    <p></p>
    <input type="submit">

</form>


<?php 



?>

<?php
require_once "../templates/admin/footer.php"
?>

