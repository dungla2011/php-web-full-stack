
<?php
require_once "../templates/admin/header.php"
?>

Danh sách news | <a href="/admin/news/add">Add </a>


<form action="" method="get">
Tìm ten: <input type="text" name='search_name' value="<?php echo $_GET['search_name'] ?? '' ?>">
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
        echo("\n <a href='/admin/news?page=$i'> $i </a> | ");
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

<table border="1" style='width:100%'>
    <tr>
<td>Id</td>
<td> <a href="/admin/news?sort_by=name&sort_type=<?php echo $sort_type  ?>"> 
Tiêu đề </a></td>
<td> <a href="/admin/news?sort_by=created_at&sort_type=<?php echo $sort_type  ?>"> 
Ngày tạo </a></td>

<td>Action</td>

    </tr>
<?php 

    if(isset($data))
    foreach($data AS $one){
        $id = $one['id'];
        $name = $one['name'];
        $desc = $one['description'];
        $content = $one['content'];
        $created_at = $one['created_at'];
        
        echo("\n<tr>");

        
        echo("\n<td>  $id </td> <td> $name  </td> <td> $created_at </td>");
        echo("\n<td> <a href='/admin/news/edit?id=$id'>  Edit </a> | 
        <a href='/admin/news/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

