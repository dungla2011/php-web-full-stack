<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once "../app/Database.php";

$rqUri = $_SERVER['REQUEST_URI'];

//Tên route: nếu giống nhau phần đầu, thì các route dài hơn được đặt ở trên để được xử lý đúng
$routes = [
    '/member' => [MemberController::class, 'index'],
    
    '/admin/users/delete' => [UserController::class, 'delete'],
    '/admin/users/add' => [UserController::class, 'add'],
    '/admin/users/edit' => [UserController::class, 'edit'],
    '/admin/users' => [UserController::class, 'list'],

    '/admin/products/delete' => [ProductController::class, 'delete'],
    '/admin/products/add' => [ProductController::class, 'add'],
    '/admin/products/edit' => [ProductController::class, 'edit'],
    '/admin/products' => [ProductController::class, 'list'],


    '/admin/news/delete' => [NewsController::class, 'delete'],
    '/admin/news/add' => [NewsController::class, 'add'],
    '/admin/news/edit' => [NewsController::class, 'edit'],
    '/admin/news' => [NewsController::class, 'list'],

    '/admin/student/delete' => [StudentController::class, 'delete'],
    '/admin/student/add' => [StudentController::class, 'add'],
    '/admin/student/edit' => [StudentController::class, 'edit'],
    '/admin/student' => [StudentController::class, 'list'],

    '/news' => [NewsPublicController::class, 'index'],
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

