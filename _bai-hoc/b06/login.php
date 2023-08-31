<?php

session_start();

// Kiểm tra xem người dùng đã nhấn nút đăng nhập hay chưa
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy thông tin tài khoản và mật khẩu từ form đăng nhập
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    // (Đây chỉ là ví dụ, bạn cần sử dụng cơ sở dữ liệu để kiểm tra thông tin đăng nhập)
    if ($username === "user123" && $password === "password123") {
        // Đăng nhập thành công
        // Thiết lập biến session để lưu thông tin đăng nhập
        $_SESSION["username"] = $username;

        // $_COOKIE['username'];        
        // setcookie("username", '...', time() + 30 * 86400... );
        // setcookie("password", );

        // Chuyển hướng đến trang chào mừng sau khi đăng nhập thành công
        header("Location: welcome.php");
        exit;
    } else {
        // Đăng nhập không thành công, thông báo lỗi
        echo "Tài khoản hoặc mật khẩu không đúng!";
    }
}
?>
