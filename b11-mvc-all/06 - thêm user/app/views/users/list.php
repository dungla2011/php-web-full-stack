<?php 
require_once "../templates/admin/header.php"
?>
<b>Danh sách người dùng</b>
<p><a href="/admin/users/add">+ Thêm mới</a> </p>

<?php 

if($data){
    $cc = 0;
    foreach($data as $k=>$v) {
        $cc++;
        $id = $v['id'];
        $first_name = $v['first_name'];
        $last_name = $v['last_name'];
        $email = $v['email'];
        echo("\n$cc.  ID = $id | $first_name | $last_name | $email");
        echo("\n<br/>");
    }
}

?>



<?php 
require_once "../templates/admin/footer.php"
?>

