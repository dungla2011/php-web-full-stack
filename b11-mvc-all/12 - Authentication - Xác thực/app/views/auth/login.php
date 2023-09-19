<?php 
require_once "../templates/home/header.php"
?>

LOGIN


<?php 

if(isset($msg))
    echo "<p> $msg </p> ";

if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

if( $_SESSION['userinfo'] ?? ''){
    echo("\n<a href='/logout'> Đăng xuất </a>");
}else{

?>
<p></p>
<form action="" method="post">

    Tài khoản <input type="text" name="username" placeholder="Nhập email/tài khoản!">
    <p></p>
    Mật khẩu: <input type="password" name="password" placeholder="Nhập mật khẩu">
    <p></p>
    <input type="submit" value="Đăng nhập">
    <p></p>


</form>
<?php 
}

require_once "../templates/home/footer.php"
?>