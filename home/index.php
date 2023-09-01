<<<<<<< HEAD
<b>LOGO</b>
<hr>
<a href="/">Trang Chủ</a> |
<a href="?ctrl=news">Tin tức</a> |
<a href="?ctrl=products">Sản phẩm</a> |
=======
LOGO
<hr>
<a href="/">Trang Chủ</a> |
<a href="?action=news">Tin tức</a> |
<a href="?action=products">Sản phẩm</a> |
>>>>>>> bf0ccef300f17b3327041f7fad81e872432f23ee
<a href="/member">Thành viên</a> | 
<a href="/admin">ACP</a>
<hr>

<?php
<<<<<<< HEAD
$act = $_GET['ctrl'] ?? null;
=======
$act = $_GET['action'] ?? null;
>>>>>>> bf0ccef300f17b3327041f7fad81e872432f23ee
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