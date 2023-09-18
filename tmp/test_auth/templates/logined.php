<span style='float:right'>
<?php
if($_SESSION['userinfo'] ?? ''){
    echo $_SESSION['userinfo']['email'];
    echo " <a href='/logout'> Logout </a> ";    
}
else{
    echo " <a href='/login'> Đăng nhập </a> ";   
}
?>
</span>