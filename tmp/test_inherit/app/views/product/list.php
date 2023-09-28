
<?php
require_once "../templates/admin/header.php"
?>

Danh sách product | <a href="/admin/product/add">Add </a>


<form action="" method="get">
Tìm ten: <input type="text" name='search_val' value="<?php echo $_GET['search_val'] ?? '' ?>">
<input type="submit" value="Tìm">
</form>


<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error))
    echo "<p> $error </p> ";


$search_val = $_GET['search_val'] ?? '';
$searchString = '';
if($search_val){
    $searchString = "&search_val=$search_val";
}


?>
<p></p>
Trang: 
<?php

    if(isset($nPage))
    for($i = 1; $i <= $nPage ; $i++){
        echo("\n <a href='/admin/product?page=$i$searchString'> $i </a> | ");
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
<td>
<a href="/admin/product?sort_by=id&sort_type=<?php echo $sort_type.$searchString  ?>"> 
Id </a>

</td>
<td> 
    <a href="/admin/product?sort_by=name&sort_type=<?php echo $sort_type.$searchString  ?>"> 
Tên </a>
</td>

<td> 
    <a href="/admin/product?sort_by=price&sort_type=<?php echo $sort_type.$searchString  ?>"> 
Giá </a>
</td>

<td> 
    <a href="/admin/product?sort_by=created_at&sort_type=<?php echo $sort_type.$searchString  ?>"> 
Ngày tạo </a>
</td>

<td>Action</td>

    </tr>
<?php 

    if(isset($data))
    foreach($data AS $one){
        $id = $one['id'];
        $name = $one['name'];
        $price = $one['price'];
        $desc = $one['description'];
        $content = $one['detail'];
        $created_at = $one['created_at'];
        
        echo("\n<tr>");

        
        echo("\n<td>  $id </td> <td> $name  </td> <td> $price 
        </td> <td> $created_at </td>");
        echo("\n<td> <a href='/admin/product/edit?id=$id'>  Edit </a> | 
        <a href='/admin/product/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

