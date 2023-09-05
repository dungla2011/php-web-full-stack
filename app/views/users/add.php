<?php 
require_once "../templates/admin/header.php"
?>


Add user


<p></p>

<form action="" method="post">

    Username: <input name="username" type="text" placeholder="Nhap username" />
    <p></p>
    Email: <input name='email' type="text" placeholder="Nhap email" />
    <p></p>
    FirstName: <input name='first_name' type="text" placeholder="Nhap first_name" />
    <p></p>
    LastName: <input name='last_name' type="text" placeholder="Nhap last_name" />
    <p></p>
    Password: <input name='password' type='password' />

    <p></p>
    <input type="submit">

</form>

<?php 
require_once "../templates/admin/footer.php"
?>
