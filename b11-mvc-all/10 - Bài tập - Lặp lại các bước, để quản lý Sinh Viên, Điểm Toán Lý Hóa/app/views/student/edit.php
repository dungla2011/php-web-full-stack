
<?php
require_once "../templates/admin/header.php";


// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>

Edit student ...

<?php 

if(isset($msg))
    echo "<p> $msg </p> ";

if(isset($error))
    echo "<p> $error </p> ";

?>

<form action="" method="post">


<form action="" method="post">
    Họ: <input type="text" name='first_name' value="<?php echo $ret['first_name'] ?>">
    <p></p>
    Tên: <input type="text" name='last_name' value="<?php echo $ret['last_name'] ?>">
    <p></p>
    Toán: <input type="text" name='math' value="<?php echo $ret['math'] ?>">
    <p></p>
    Lý: <input type="text" name='physical' value="<?php echo $ret['physical'] ?>">
    <p></p>
    Hóa: <input type="text" name='chemistry' value="<?php echo $ret['chemistry'] ?>">
    <p></p>
    <input type="submit">

<?php 


?>

<?php
require_once "../templates/admin/footer.php"
?>

