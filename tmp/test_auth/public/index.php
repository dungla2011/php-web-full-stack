<?php 
session_start();

require_once "../app/Database.php";
require_once "../app/helper/Auth.php";
require_once "../app/helper/common.php";

$rqUri = $_SERVER['REQUEST_URI'];

if(!Auth::checkAuth($rqUri))
    return;


//Tên route: nếu giống nhau phần đầu, thì các route dài hơn được đặt ở trên để được xử lý đúng
$routes = [
    '/login' => [LoginController::class, 'index'],
    '/logout' => [LoginController::class, 'logout'],
    '/member' => [MemberController::class, 'index'],
    '/admin/users/delete' => [UserController::class, 'delete'],
    '/admin/users/add' => [UserController::class, 'add'],
    '/admin/users/edit' => [UserController::class, 'edit'],
    '/admin/users' => [UserController::class, 'list'],
    '/admin' => [AdminController::class, 'index'],
    '/' => [HomeController::class, 'index'],
];


foreach($routes AS $uri => $arrayCtrl){

    $class = $arrayCtrl[0];
    $method = $arrayCtrl[1];


    $file = "../app/controllers/$class.php";   

    if(str_starts_with($rqUri, $uri)){
         require_once $file;
         $obj = new $class;
         $obj->$method();
         
         break;
    }
}


echo("\n<hr/> DEBUG: URI = $rqUri ");
echo("\n<br/> Controller->Action: $class() -> $method() ");
echo "<pre> File includes: ";
print_r(get_included_files());
echo "</pre>";
//

