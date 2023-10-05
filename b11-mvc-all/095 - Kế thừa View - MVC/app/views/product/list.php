<?php
require_once "../templates/admin/header.php"
?>

Danh sách Sản phẩm | <a href="/admin/products/add">Thêm </a>


<form action="" method="get">
Tìm tên sản phẩm: <input type="text" name='search_value' value="<?php echo $_GET['search_value'] ?? '' ?>">
<input type="submit" value="Tìm">
</form>


<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

$search_value = $_GET['search_value'] ?? '';
$searchString = '';
if($search_value){
    $searchString = "&search_value=$search_value";
}

?>
<p></p>
Trang: 
<?php
    if(isset($nPage))
    for($i = 1; $i <= $nPage ; $i++){
        echo("\n <a href='/admin/products?page=$i$searchString'> $i </a> | ");
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
<td> <a href="/admin/products?sort_by=name&sort_type=<?php echo $sort_type .$searchString  ?>"> 
Name </a></td>
<td> <a href="/admin/products?sort_by=price&sort_type=<?php echo $sort_type . $searchString ?>"> 
Price </a></td>

<td> <a href="/admin/products?sort_by=created_at&sort_type=<?php echo $sort_type . $searchString ?>"> 
Ngày tạo </a></td>


<td>Action</td>

    </tr>
<?php 

    if(isset($data))
    foreach($data AS $one){
        $id = $one['id'];
        $name = $one['name'];
        $price = $one['price'];
        $created_at = $one['created_at'];
        // $last_name = $one['last_name'];

        echo("\n<tr>");

        
        echo("\n<td>  $id </td> <td> $name  </td> <td> $price </td><td> $created_at </td>");
        echo("\n<td> <a href='/admin/products/edit?id=$id'>  Edit </a> | 
        <a href='/admin/products/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

