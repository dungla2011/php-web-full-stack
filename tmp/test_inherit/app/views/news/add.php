<?php
require_once "../templates/admin/header.php"
?>

Add News:

<?php
if (isset($msg))
    echo "<p> $msg </p> ";
if (isset($error))
    echo "<p> $error </p> ";

?>

<form action="" method="post">

    <table>
        <tr>
            <td>
                Tiêu đề
            </td>
            <td>
                <input type="text" name='name'>
            </td>
        </tr>
        <tr>
            <td>
                Mô tả
            </td>
            <td>
                <textarea rows="3" cols="40" name='description'></textarea>
            </td>
        </tr>

        <tr>
            <td> Nội dung</td>
            <td><textarea rows="10" cols="40" name='content'></textarea></td>
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