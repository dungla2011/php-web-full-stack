<?php

require_once '../app/models/User.php';

class LoginController {
    public function login() {

        // echo "<pre>SS=";
        // print_r($_SESSION);
        // echo "</pre>";

        if($_SESSION['userinfo'] ?? ''){
            $msg = "Bạn đã đăng nhập!";
        }

        if($_POST['username'] ?? ''){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $ret = User::auth($user, $pass);
            if($ret){
                $_SESSION['userinfo'] = $ret;
                $msg = " Đăng nhập thành công!";
            }
            else{
                $error = "Sai tên đăng nhập hoặc mật khẩu!";
            }
        }


        require '../app/views/auth/login.php';
    }
    public function logout() {
        
        session_destroy();

        header("Location: /login");

    }
}
