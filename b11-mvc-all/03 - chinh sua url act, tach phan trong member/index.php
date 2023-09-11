<?php

$rqUri = $_SERVER['REQUEST_URI'];

$routes = [
    '/admin/users/add' => "app/admin/users/add.php",
    '/admin/users' => "app/admin/users/index.php",
    '/admin/news' => "app/admin/news.php",
    '/admin/products' => "app/admin/products.php",
    '/admin/orders' => "app/admin/orders.php",
    '/admin' => "app/admin/index.php",
    '/member/orders' => "app/member/orders/index.php",
    '/member' => "app/member/index.php",
    
    '/' => "app/home/index.php",
];


foreach($routes AS $uri => $file){
    if(str_starts_with($rqUri, $uri)){
        require_once $file;
        break;
    }
}

echo("\n<br/> Debug info, URI = $rqUri , $file");
echo("\n<hr/> DEBUG: URI = $rqUri ");
echo("\n<br/> Controller->Action: $class() -> $method() ");
echo "<pre> File includes: ";
print_r(get_included_files());
echo "</pre>";