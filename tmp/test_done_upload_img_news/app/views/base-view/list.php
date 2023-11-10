<?php
require_once "../templates/admin/header.php";

if(isset($modelClass) && $modelClass instanceof BaseModel);

// ProductController::$adminUrl
$adminUrl = $controllerClass::$adminUrl;

?>

Danh sách  <?php echo $modelClass::$nameView ?>  <a href="<?php echo $adminUrl ?>/add">Thêm </a>


<form action="" method="get">
Tìm tên <?php echo $modelClass::$nameView ?> <input type="text" name='search_value' value="<?php echo $_GET['search_value'] ?? '' ?>">
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
        echo("\n <a href='$adminUrl?page=$i$searchString'> $i </a> | ");
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

    <?php 
    
    foreach($modelClass::$indexListField AS $field ){
        $name = $modelClass::$metaFieldName[$field];

        if(in_array($field, $modelClass::$sort_field)){
            echo("\n<td> <a href='$adminUrl?sort_by=$field&sort_type=$sort_type$searchString'> $name: </a>  </td>");
        }else
            echo("\n<td>$name </td>");
    }

    echo("\n<td> Action </td>");

    
    ?>


    </tr>

<!-- <tr>
 
<td>Id</td>
<td> <a href="<?php echo $adminUrl ?>?sort_by=name&sort_type=<?php echo $sort_type .$searchString  ?>"> 
Name </a></td>
<td> <a href="<?php echo $adminUrl ?>?sort_by=price&sort_type=<?php echo $sort_type . $searchString ?>"> 
Price </a></td>

<td> <a href="<?php echo $adminUrl ?>?sort_by=created_at&sort_type=<?php echo $sort_type . $searchString ?>"> 
Ngày tạo </a></td>


<td>Action</td>

    </tr> -->
<?php 


    if(isset($data))
    foreach($data AS $one){
        ;

        echo("<tr>");
        foreach($modelClass::$indexListField AS $field ){
            $val = $one[$field];
            if(($modelClass::$metaFieldType[$field] ?? '') == 'image')
                echo "<td><img src='$val'></td>";
            else
                echo "<td> $val </td> ";
        }
       
        
        $id = $one['id'];
        // $name = $one['name'];
        // $price = $one['price'];
        // $created_at = $one['created_at'];
        // // $last_name = $one['last_name'];

        // echo("\n<tr>");
        
        // echo("\n<td>  $id </td> <td> $name  </td> <td> $price </td><td> $created_at </td>");
         echo("\n<td> <a href='$adminUrl/edit?id=$id'>  Edit </a> | 
         <a href='$adminUrl/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

