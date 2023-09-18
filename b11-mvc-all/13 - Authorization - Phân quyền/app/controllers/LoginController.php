<?php
require_once '../app/models/User.php';



class LoginController {


    function login(){

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        if($_SESSION['userinfo'] ?? '' ){
            $msg = " Bạn đã đăng nhập!";
        }
        else
        if($_POST['username'] ?? '')
        if($ret = User::auth($_POST['username'], $_POST['password'])){
            $msg = " Đăng nhập thành công!";
            // echo "<pre>";
            // print_r($ret);
            // echo "</pre>";
            $_SESSION['userinfo'] = $ret;

        }
        else{
            $error = "Sai tên đăng nhập hoặc mật khẩu!";
        }

        require_once "../app/views/auth/login.php";
    }

    function logout(){
        session_destroy();
        header("Location: /login ");
    }

}