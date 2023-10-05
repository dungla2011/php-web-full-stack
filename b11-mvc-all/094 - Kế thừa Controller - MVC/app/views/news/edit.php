
<?php
require_once "../templates/admin/header.php";


// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>

Edit Tin:

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


    Tên Tin: <input type="text" name='name' value='<?php echo $ret['name'] ?>'>
    <p></p>
    Mô tả: <input type="text" name='description' value='<?php echo $ret['description'] ?>'>
    <p></p>
    Chi tiết: <input type="text" name='content' value='<?php echo $ret['content'] ?>'>
    <p></p>
    
    <input type="submit">

</form>


<?php 

?>

<?php
require_once "../templates/admin/footer.php"
?>

