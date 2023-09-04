<?php



require_once '../app/models/User.php';

class UserController {
    public function list() {

        $data = User::list();

        // Gọi view để hiển thị list user
        require_once '../app/views/users/list.php';
    }

    public function edit() {
        $uid = $_GET['id'] ?? 0;
        if(!$uid)
            die("Not userid?");
        // Lấy đối tượng User từ dữ liệu cơ sở dữ liệu...
        $user = new User($uid, 'example@email.com');
        // Gọi view để hiển thị thông tin người dùng
        require_once '../app/views/users/edit.php';
    }

    public function add() {
        // Gọi view để hiển thị add user
        require_once '../app/views/users/add.php';
    }
}
