<?php
session_start();

// Hủy session và đăng xuất
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: index.html");
exit;
?>
