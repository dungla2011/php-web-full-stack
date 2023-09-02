<b>LOGO</b>
<hr>
<a href="/">Trang Chủ</a> |
<a href="?ctrl=news">Tin tức</a> |
<a href="?ctrl=products">Sản phẩm</a> |
<a href="/member">Thành viên</a> | 
<a href="/admin">ACP</a>
<hr>

<?php
$act = $_GET['ctrl'] ?? null;
?>
<div class="content">
    <?php
    if ($act == 'news') {      
        require_once "news.php";
    } else
    if ($act == 'products') {
        require_once "products.php";
    } else
    if ($act == 'orders') {
        require_once "orders.php";
    } else
    if ($act == 'users') {
        require_once "users.php";
    } else {
        require_once "main.php";
    }
    ?>

</div>

<hr>
Footer trang chủ...