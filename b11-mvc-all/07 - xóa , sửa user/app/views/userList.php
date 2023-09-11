
<?php
require_once "../templates/admin/header.php"
?>

Danh sách user | <a href="/admin/users/add">Add </a>

<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error))
    echo "<p> $error </p> ";

?>

<table border="1">
    <tr>
<td>Id</td>
<td>User</td>
<td>Email</td>
<td>Action</td>

    </tr>
<?php 

    foreach($data AS $one){
        $id = $one['id'];
        $username = $one['username'];
        $email = $one['email'];
        $first_name = $one['first_name'];
        $last_name = $one['last_name'];

        echo("\n<tr>");

        
        echo("\n<td>  $id </td> <td> $username  </td> <td> $email </td>");
        echo("\n<td> <a href='/admin/users/edit?id=$id'>  Edit </a> | 
        <a href='/admin/users/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>

<?php
require_once "../templates/admin/footer.php"
?>

