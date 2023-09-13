
<?php
require_once "../templates/admin/header.php"
?>

Danh sách Sinh viên | <a href="/admin/student/add">Add </a>


<form action="" method="get">
Tìm tên: <input type="text" name='search_first_name'
 value="<?php echo $_GET['search_fist_name'] ?? '' ?>">
<input type="submit" value="Tìm">
</form>


<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error))
    echo "<p> $error </p> ";

?>
<p></p>
Trang: 
<?php
    if(isset($nPage))
    for($i = 1; $i <= $nPage ; $i++){
        echo("\n <a href='/admin/student?page=$i'> $i </a> | ");
    }
    $sort_type = "asc";
    if($_GET['sort_type'] ?? ''){
        $sort_type = $_GET['sort_type'];
        if($sort_type == 'asc')
            $sort_type = 'desc';
        else
            $sort_type = 'asc';
    }
?>

<table border="1">
    <tr>
<td>Id</td>
<td> <a href="/admin/student?sort_by=first_name&sort_type=<?php echo $sort_type  ?>"> 
Họ </a></td>
<td> <a href="/admin/student?sort_by=last_name&sort_type=<?php echo $sort_type  ?>"> 
Tên </a></td>
<td>Toán</td>
<td>Lý</td>
<td>Hóa</td>

<td>Action</td>

    </tr>
<?php 

    if(isset($data))
    foreach($data AS $one){
        $id = $one['id'];
        $firstName = $one['first_name'];
        $lastName = $one['last_name'];
        $math = $one['math'];
        $physic = $one['physical'];
        $chemis = $one['chemistry'];

        echo("\n<tr>");
        echo("\n<td>  $id </td> <td> $firstName  </td> <td> $lastName </td>");
        echo("\n<td>  $math </td> <td> $physic  </td> <td> $physic </td>");
        echo("\n<td> <a href='/admin/student/edit?id=$id'>  Edit </a> | 
        <a href='/admin/student/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

