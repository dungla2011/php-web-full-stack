<?php

require_once "../app/models/User.php";

class Auth {
    static function checkAuth($rqUri){

        if(str_starts_with($rqUri, '/admin')){    
            
            $allow = 0;
            if($user = $_SESSION['userinfo'] ?? '')
                if(User::get($user['id'])['is_admin'])
                    $allow = 1;
            
            if(!$allow){
                require "../templates/home/header.php";
                echored("\nBạn không có quyền truy cập vùng này!");
                require "../templates/home/footer.php";
                return 0;
            }
        }
        elseif(str_starts_with($rqUri, '/member')){    
            
            if(isset($_SESSION['userinfo'])){
                // echo("\n<br/> OK ");
            }
            else{
                require "../templates/home/header.php";
                echored("\nBạn không có quyền truy cập vùng này!");
                require "../templates/home/footer.php";
                return 0;
            }
        }
        return 1;
    }

}