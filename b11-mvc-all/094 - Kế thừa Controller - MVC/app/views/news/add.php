
<?php
require_once "../templates/admin/header.php"
?>

Add News:

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

    Tên Tin: <input type="text" name='name' >
    <p></p>
    Mô tả: <input type="text" name='description' >
    <p></p>
    Nội dung: <input type="text" name='content' >
    <p></p>
    <input type="submit">

</form>


<?php 



?>

<?php
require_once "../templates/admin/footer.php"
?>

