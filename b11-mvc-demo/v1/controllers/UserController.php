<?php

require_once 'models/User.php';

class UserController {
    public function showProfile($username) {
        // Tạo một đối tượng User từ dữ liệu cơ sở dữ liệu hoặc nguồn dữ liệu khác
        $user = new User($username, 'example@email.com');
        
        // Gọi view để hiển thị thông tin người dùng
        require __DIR__.'/../views/userProfile.php';
    }
}
