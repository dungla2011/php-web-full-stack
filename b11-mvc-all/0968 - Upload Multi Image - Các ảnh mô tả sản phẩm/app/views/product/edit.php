
<?php
require_once "../templates/admin/header.php";


// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>

Edit Product:

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


    Tên sản phẩm: <input type="text" name='name' value='<?php echo $ret['name'] ?>'>
    <p></p>
    Giá: <input type="text" name='price' value='<?php echo $ret['price'] ?>'>
    <p></p>
    Mô tả: <input type="text" name='description' value='<?php echo $ret['description'] ?>'>
    <p></p>
    
    <input type="submit">

</form>


<?php 

?>

<?php
require_once "../templates/admin/footer.php"
?>

