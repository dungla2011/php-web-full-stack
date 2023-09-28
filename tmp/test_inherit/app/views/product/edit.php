<?php
require_once "../templates/admin/header.php";


// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>

Edit Sản phẩm

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

    <table>
    <tr>
            <td>
                Tiêu đề
            </td>
            <td>
                <input type="text" name='name' value='<?php echo $ret['name'] ?>'>
            </td>
        </tr>
        <tr>
            <td> Giá</td>
            <td>
                <input type="number" name='price' value='<?php echo $ret['price'] ?>'>
            </td>
        </tr>
        <tr>
            <td>
                Mô tả
            </td>
            <td>
                <textarea rows="3" cols="40" name='description'><?php echo $ret['description'] ?></textarea>
            </td>
        </tr>

        <tr>
            <td> Nội dung</td>
            <td><textarea rows="10" cols="40" name='detail' ><?php echo $ret['description'] ?></textarea></td>
        </tr>


        <tr>
            <td><input type="submit"></td>
            <td></td>
        </tr>
    </table>
</form>

<?php



?>

<?php
require_once "../templates/admin/footer.php"
?>