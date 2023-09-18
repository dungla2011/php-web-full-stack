<?php
require_once "../templates/home/header.php"
?>

<p></p>
<b>Đăng nhập </b>

<?php
if (isset($msg))
    echo "<p> $msg </p> ";
if (isset($error)){
    echo "<p style='color: red'> $error </p> ";
}

if ($_SESSION['userinfo'] ?? '') {
?>
    <a href='/logout'> Đăng xuất </a>
<?php
} else {
?>

    <p></p>
    <form action="" method="post">

        <table>
            Tên đăng nhập:
            <input type="text" name="username">
            <p></p>
            Mật khẩu:
            <input type="password" name="password">
            <p></p>
            <input type="submit" value="Đăng nhập">
        </table>


    </form>


<?php
}
?>


<?php
require_once "../templates/home/footer.php"
?>