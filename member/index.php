Member...
<hr>
<a href="/">Trang Chủ</a> |
<a href="/member?action=orders">Đơn hàng</a> |
<a href="/member">Tài khoản</a>
<hr>

<?php
$act = $_GET['action'] ?? null;
?>
<div class="content">
    <?php
    if ($act == 'orders') {
        require_once "orders.php";
    } else {
        require_once "main.php";
    }
    ?>

</div>

<hr>
Footer Member