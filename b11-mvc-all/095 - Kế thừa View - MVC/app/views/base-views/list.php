<?php
require_once "../templates/admin/header.php";
$adminUri = $controllerClass::$adminUri;
?>

Danh sách <?php echo $modelClass::$nameView ?> | <a href="<?php echo $adminUri ?>/add">Thêm </a>

<p></p>
<form action="" method="get">
Tìm <?php echo $modelClass::$nameView ?>: <input type="text" name='search_value' value="<?php echo $_GET['search_value'] ?? '' ?>">
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
        echo("\n <a href='$adminUri?page=$i$searchString'> $i </a> | ");
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
foreach($modelClass::$indexListField AS $field){
    $fieldDes = $modelClass::$metaFieldName[$field];
    if(in_array($field, $modelClass::$sort_field))
        echo "<td><a href='$adminUri?sort_by=$field&sort_type=$sort_type$searchString'> $fieldDes </td>";
    else
        echo "<td>$fieldDes</td>";
}
?>
<td>Action</td>

</tr>

<?php 


    if(isset($data))
    foreach($data AS $one){
        echo("\n<tr>");
        foreach($modelClass::$indexListField AS $field){
            $val = $one[$field];
            echo "<td>$val</td>";
        }
        $id = $one['id'];

        echo("\n<td> <a href='$adminUri/edit?id=$id'>  Edit </a> | 
        <a href='$adminUri/delete?id=$id'>  Delete </a> </td>");
        echo("\n</tr>");

        // $id = $one['id'];
        // $name = $one['name'];
        
        // $created_at = $one['created_at'];
        // // $last_name = $one['last_name'];
        // echo("\n<tr>");
       
        // echo("\n<td>  $id </td> <td> $name  </td> <td> $created_at </td>");
        // echo("\n<td> <a href='$adminUri/edit?id=$id'>  Edit </a> | 
        // <a href='$adminUri/delete?id=$id'>  Delete </a> </td>");
        // echo("\n</tr>");
    }
?>
</table>




<?php
require_once "../templates/admin/footer.php"
?>

