<?php 
require_once "../templates/home/header.php"
?>

<h1>
Đăng nhập
</h1>

<?php 

if(isset($msg))
    echo "<p> $msg </p> ";

if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

if($_SESSION['userinfo'] ?? '' ){
    echo("\n<a href='/logout'> Đăng xuất </a> ");
}
else{
?>


<p></p>
<form action="" method="post">

    Tài khoản/Email: <input type="text" name='username'>
    <p></p>
    Mật khẩu: <input type="password" name='password'>

    <p></p>
    <input type="submit" value="Đăng nhập"> 
    <a href="/registration">Đăng ký</a>


</form>
<p></p>

<?php 
}
require_once "../templates/home/footer.php"
?>