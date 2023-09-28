<?php 
require_once "../templates/home/header.php"
?>

<h1>
Đăng ký tài khoản
</h1>

<?php 

if(isset($msg))
    echo "<p> $msg </p> ";

if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

?>


<p></p>
<form action="" method="post">

    Username: <input type="text" name='username' >
    <p></p>
    Email: <input type="text" name='email' >
    <p></p>
    Password: <input type="password" name='password' >
    <p></p>
    Nhập lại Password: <input type="password" name='re_password' >
    <p></p>
    <input type="submit" value="Đăng ký">
    <a href="/login">Đăng nhập</a>

</form>
<p></p>

<?php 

require_once "../templates/home/footer.php"
?>