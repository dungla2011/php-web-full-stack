<?php
require_once "../templates/admin/header.php";
// ProductController::$adminUrl
$adminUrl = $controllerClass::$adminUrl;
?>

<section class="content">
<div class="container-fluid pt-3">


<div class="card">

<div class="card-header ">
<a class="float-right" href="<?php echo $adminUrl ?>/add">
<i class='fa fa-plus'></i>
</a>
<h3 class="card-title">
Danh sách  <?php echo $modelClass::$nameView ?>  
</h3>

<form action="" method="get">
    <div class="row">
        <div class='col-md-3'>
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" name='search_value' value="<?php echo $_GET['search_value'] ?? '' ?>">
            <span class="input-group-append">
            <button type="submit" class="btn btn-info btn-flat">Tìm</button>
            </span>
        </div>
        </div>
    </div>
</form>


</div>

<div class="card-body">




<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error) && $error){
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


<ul class="pagination pagination-sm float-right">
<!-- <li class="page-item"><a class="page-link" href="#">«</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">»</a></li> -->


<?php
    if(isset($nPage))
    for($i = 1; $i <= $nPage ; $i++){
        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$adminUrl?page=$i$searchString\">$i</a></li>";
        // echo("\n <a href='$adminUrl?page=$i$searchString'> $i </a> | ");
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

</ul>

<table class="table table-bordered index">
    <tr>
    <?php 
    foreach($modelClass::$indexListField AS $field ){
        $name = $modelClass::$metaFieldName[$field];

        if(in_array($field, $modelClass::$sort_field)){
            echo("\n<th class='field_$field'> <a href='$adminUrl?sort_by=$field&sort_type=$sort_type$searchString'> $name </a>  </th>");
        }else
            echo("\n<th  class='field_$field'>$name </th>");
    }
    echo("\n<th class='action'> Action </th>");    
    ?>
    </tr>
<?php 

    if(isset($data))
    foreach($data AS $one){

        echo("<tr>");
        foreach($modelClass::$indexListField AS $field ){
            $val = $one[$field];
            
            //echo "<td> $val </td> ";

            if(($modelClass::$metaFieldType[$field] ?? '') == 'image')
                echo "<td class='field_$field'><img src='$val'></td>";
            else
                echo "<td class='field_$field'> $val </td> ";
        }
       
        
        $id = $one['id'];
        // $name = $one['name'];
        // $price = $one['price'];
        // $created_at = $one['created_at'];
        // // $last_name = $one['last_name'];

        // echo("\n<tr>");
        
        // echo("\n<td>  $id </td> <td> $name  </td> <td> $price </td><td> $created_at </td>");
         echo("\n<td class='action'> <a href='$adminUrl/edit?id=$id'>  <i class='fa fa-edit'></i> </a>  
         <a href='$adminUrl/delete?id=$id'>  <i class='fa fa-trash'></i> </a> </td>");
        echo("\n</tr>");
    }
?>
</table>

</div>
</div>
</div>
</section>



<?php
require_once "../templates/admin/footer.php"
?>

