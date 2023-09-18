<?php

require_once '../app/models/User.php';

class LoginController {
    public function index() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if($_SESSION['userinfo'] ?? ''){
            $msg = ("\nBạn đã đăng nhập!");
            //return;
        }
        else
        if($_POST['username'] ?? ''){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ret = User::auth($username, $password);
            if($ret){
                $_SESSION['userinfo'] = $ret;
                $msg = "Bạn đã đăng nhập thành công!";
            }
            else{
                $error = "Tên người dùng hoặc mật khẩu không đúng!";
            }
//            echo("\n<br/> RET = '$ret'");
        }

        require '../app/views/auth/login.php';
    }

    function logout() {        
        session_start();
        // Hủy session để đăng xuất người dùng.
        session_destroy();
        // Chuyển hướng về trang đăng nhập.
        header('Location: /login');
    }
}
