<?php 
require_once "../templates/admin/header.php"
?>

<h1>Thông tin người dùng</h1>
    <p>Tên đăng nhập: <?php echo $user->getUsername(); ?></p>
    <p>Email: <?php echo $user->getEmail(); ?></p>
    
<?php 
require_once "../templates/admin/footer.php"
?>
