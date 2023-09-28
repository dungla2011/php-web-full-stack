<?php
require_once '../app/models/User.php';



class LoginController
{

    function registration()
    {

        try {
            $error = '';

            if ($_POST['username'] ?? '') {

                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass1 = $_POST['password'];
                $pass2 = $_POST['re_password'];


                if ($pass1 != $pass2) {
                    $error .= "Hai mật khẩu phải giống nhau!\n";
                }
                if (strlen($pass1) < 8 || strlen($pass1) > 20)
                    $error .= "Độ dài mật khẩu phải từ 8 đến 20 ký tự\n";

                if (!ctype_alnum($username)) {
                    // Username is valid
                    $error .= "Username chỉ chi phép ký tự, số\n";
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error .= "Email không đúng định dạng";
                }

                if (!$error) {
                    if (User::add($_POST)) {
                        $msg = "Đăng ký thành công!";
                    } else {
                        $error .= "Có lỗi Đăng ký!\n";
                    }
                }
            }

            //Bắt lỗi lớp Exception là mọi loại lỗi, kể cả PDOException
        } catch (Exception $e) {
            $error .=  "Có lỗi: " . $e->getMessage() . " \n" . $e->getTraceAsString();
        }


        require_once "../app/views/auth/registration.php";
    }

    function login()
    {

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        if ($_SESSION['userinfo'] ?? '') {
            $msg = " Bạn đã đăng nhập!";
        } else
        if ($_POST['username'] ?? '')
            if ($ret = User::auth($_POST['username'], $_POST['password'])) {
                $msg = " Đăng nhập thành công!";
                // echo "<pre>";
                // print_r($ret);
                // echo "</pre>";
                $_SESSION['userinfo'] = $ret;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu!";
            }

        require_once "../app/views/auth/login.php";
    }

    function logout()
    {
        session_destroy();
        header("Location: /login ");
    }
}
