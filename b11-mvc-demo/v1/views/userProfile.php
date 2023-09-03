<!DOCTYPE html>
<html>
<head>
    <title>Thông tin người dùng</title>
</head>
<body>
    <h1>Thông tin người dùng</h1>
    <p>Tên đăng nhập: <?php echo $user->getUsername(); ?></p>
    <p>Email: <?php echo $user->getEmail(); ?></p>
</body>
</html>
