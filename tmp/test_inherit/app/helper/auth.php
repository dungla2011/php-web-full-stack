<?php 

require_once "../app/models/User.php";

class Auth {

    static function checkAuthorization($rqUri){
        if(str_starts_with($rqUri, '/member') || str_starts_with($rqUri, '/admin')){
            if($_SESSION['userinfo'] ?? ''){
        
                if(str_starts_with($rqUri, '/admin'))
                if(!$_SESSION['userinfo']['is_admin'])
                {
                    require_once "../templates/home/header.php";
                    echo "Bạn không có quyền truy cập vùng Admin!";
                    require_once "../templates/home/footer.php";
                    return 0;
                }
        
        
            }else{
                require_once "../templates/home/header.php";
                echo "Bạn không có quyền truy cập vùng này!";
                require_once "../templates/home/footer.php";
                return 0;
            }
        }
        
        return 1;
    }


}

