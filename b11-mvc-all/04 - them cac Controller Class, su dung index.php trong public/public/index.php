<?php

$rqUri = $_SERVER['REQUEST_URI'];

//Tên route: nếu giống nhau phần đầu, thì các route dài hơn được đặt ở trên để được xử lý đúng
$routes = [
    // '/admin/users/add' => "app/admin/users/add.php",
    // '/admin/users' => "app/admin/users/index.php",
    // '/admin/news' => "app/admin/news.php",
    // '/admin/products' => "app/admin/products.php",
    // '/admin/orders' => "app/admin/orders.php",
    // '/admin' => "app/admin/index.php",
    // '/member/orders' => "app/member/orders/index.php",
    // '/member' => "app/member/index.php",
    
    '/admin/users/edit' => [UserController::class, 'edit'],
    '/admin/users/add' => [UserController::class, 'add'],
    '/admin/users' => [UserController::class, 'list'],
    '/admin' => [AdminController::class, 'index'],
    '/member' => [MemberController::class, 'index'],
    '/' => [HomeController::class, 'index'],
];


foreach($routes AS $uri => $ctrl){
    if(str_starts_with($rqUri, $uri)){
        $class = $ctrl[0];  //Ví dụ: UserController
        $method = $ctrl[1]; //Ví dụ: list
        
        // echo("\n<br/> OK $class");

        //File Controller cần include
        $file = "../app/controllers/".$class.".php";
        require_once $file;

        //Sau khi đã include fileController, có thể khởi tạo, gọi hàm thực thi tương ứng 
        $obj = new $class;
        $obj->$method();
        break;
    }
}

echo("\n<hr/> DEBUG: URI = $rqUri ");
echo("\n<br/> File : $file");
echo("\n<br/> Controller->Action: $class() -> $method() ");
echo "<pre> File includes: ";
print_r(get_included_files());
echo "</pre>";