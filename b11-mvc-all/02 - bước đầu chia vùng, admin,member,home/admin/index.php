<b>ADMIN</b>
<hr>
<a href="/">Trang Chủ</a> |
<a href="/admin?ctrl=news">Tin tức</a> |
<a href="/admin?ctrl=products">Sản phẩm</a> |
<a href="/admin?ctrl=orders">Đơn hàng</a> |
<a href="/admin?ctrl=users">Người dùng</a>
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
Footer admin