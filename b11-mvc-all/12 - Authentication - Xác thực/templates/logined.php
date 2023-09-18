<span style='float: right'>
<?php 
if($_SESSION['userinfo'] ?? '' ){
    echo $_SESSION['userinfo']['email'];
    echo ' | <a href="/logout"> Logout </a>';
}else{
    
    ?>
    <a href="/login">
    Login
    </a>
<?php
}
?>    
</span>