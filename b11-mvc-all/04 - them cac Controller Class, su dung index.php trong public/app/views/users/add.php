<?php 
require_once "../templates/admin/header.php"
?>


Add user

<?php
if($_POST['username'] ?? ''){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>

<p></p>

<form action="" method="post">

    Username: <input name="username" type="text" placeholder="Nhap username" />
    <p></p>
    Email: <input name='email' type="text" placeholder="Nhap email" />
    <p></p>
    Password: <input name='password' type='password' />

    <p></p>
    <input type="submit">

</form>

<?php 
require_once "../templates/admin/footer.php"
?>
