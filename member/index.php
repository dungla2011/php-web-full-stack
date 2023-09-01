<<<<<<< HEAD
<b>MEMBER</b>
<hr>
<a href="/">Trang Chủ</a> |
<a href="/member?ctrl=orders">Đơn hàng</a> |
=======
Member...
<hr>
<a href="/">Trang Chủ</a> |
<a href="/member?action=orders">Đơn hàng</a> |
>>>>>>> bf0ccef300f17b3327041f7fad81e872432f23ee
<a href="/member">Tài khoản</a>
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
    if ($act == 'orders') {
        require_once "orders.php";
    } else {
        require_once "main.php";
    }
    ?>

</div>

<hr>
Footer Member