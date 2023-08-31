<h2> LOGO...</h2>
MENU: <a href="<?php echo $_SERVER['PHP_SELF'] ?>"> HOME</a> | <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=profile">Profile</a>
<hr>
<?php
// Lấy action trên URL
$act = $_GET['action'] ?? null;
// Xử lý yêu cầu và chuyển hướng đến controller và action tương ứng  
if ($act == 'profile') {
    require 'controllers/UserController.php';
    $controller = new UserController();
    $controller->showProfile('Bill Gate');
}
else{
    echo("\n<br/> nội dung Index trang chủ");
}
?>
<hr>
<h2>FOOTER...</h2>