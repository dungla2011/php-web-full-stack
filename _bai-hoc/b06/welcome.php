<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION["username"])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.html");
    exit;
}

// Lấy tên người dùng từ biến session
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chào mừng</title>
</head>
<body>
    <h2>Chào mừng <?php echo $username; ?>!</h2>
    <p>Bạn đã đăng nhập thành công.</p>
    <p><a href="logout.php">Đăng xuất</a></p>
</body>
</html>
