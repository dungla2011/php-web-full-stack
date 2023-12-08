<?php
if($GLOBALS['pageTitle'] ?? '')
    $GLOBALS['pageTitle'] = "List "  . $GLOBALS['pageTitle'];

require_once "../templates/admin/header.php";

// ProductController::$adminUrl
$adminUrl = $controllerClass::$adminUrl;

?>

<?php

if (isset($msg))
    echo "<p> $msg </p> ";
if (isset($error) && $error) {
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

$search_value = $_GET['search_value'] ?? '';
$searchString = '';
if ($search_value) {
    $searchString = "&search_value=$search_value";
}


?>


<?php

$sort_type = "asc";
if ($_GET['sort_type'] ?? '') {
    $sort_type = $_GET['sort_type'];
    if ($sort_type == 'asc')
        $sort_type = 'desc';
    else
        $sort_type = 'asc';
}
?>




<section class="content pt-3">
    <div class="container-fluid">

        <div class="card">


            <div class="card-header">
                <a class="float-right" href="<?php echo $adminUrl ?>/add"> <i class="fa fa-plus"></i> </a>

                <h3 class="card-title">

                    <b>
                        Danh sách <?php echo $modelClass::$nameView ?>
                    </b>

                    <!-- Tìm tên <?php echo $modelClass::$nameView ?> -->


                </h3>

                <div class="row">
                <div class='col-md-3'>
                <form action="" method="get">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name='search_value' value="<?php echo $_GET['search_value'] ?? '' ?>">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">Tìm</button>
                            </span>
                        </div>
                    </form>

                    </div>          
                </div>      

            </div>
            <!-- /.card-header -->
            <div class="card-body">


                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>

                        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                        <?php
                        if (isset($nPage))
                            for ($i = 1; $i <= $nPage; $i++) {
                                echo ("\n <li class='page-item'> <a class='page-link' href='$adminUrl?page=$i$searchString'> $i </a> </li> ");
                            }
                        ?>


                        <li class="page-item"><a class="page-link" href="#">»</a></li>




                    </ul>
  

                <select name="" id="" class='float-left form-control  form-control-sm' style='width: 120px'>

                    <option value=""> - N/Page - </option>
                    <option value=""> 5 items </option>
                    <option value=""> 10 items </option>
                    <option value=""> 20 items </option>
                    <option value=""> 50 items </option>
                    <option value=""> 100 items </option>

                </select>

                <div class="clearfix"></div>

                <table class="table table-bordered mt-3 index">
                    <thead>

                        <tr>

                            <?php

                            foreach ($modelClass::$indexListField as $field) {
                                $name = $modelClass::$metaFieldName[$field];

                                if (in_array($field, $modelClass::$sort_field)) {
                                    echo ("\n<th> <a href='$adminUrl?sort_by=$field&sort_type=$sort_type$searchString'> $name </a>  </th>");
                                } else
                                    echo ("\n<th>$name </th>");
                            }

                            echo ("\n<th> Action </th>");


                            ?>


                        </tr>

                        <!-- <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr> -->
                    </thead>
                    <tbody>

                        <?php

                        if (isset($data))
                            foreach ($data as $one) {

                                echo ("<tr>");
                                foreach ($modelClass::$indexListField as $field) {

                                    $val = $one[$field];
                                    if($val)
                                        $val = htmlspecialchars($val);
                                    //echo "<td> $val </td> ";
                                    $type =  $modelClass::$metaFieldType[$field] ?? '';
                                    if ($type == 'image')
                                        echo "<td class='field_$field'><img src='$val'></td>";
                                    elseif ($type == 'checkbox'){
                                        $txt = '<input type="checkbox" checked disabled>';
                                        if(!$val)
                                            $txt = '<input type="checkbox" disabled>';
                                        echo "<td class='field_$field checkbox'> $txt </td>";
                                    }
                                    elseif ($type == 'selectbox'){
                                        $func = '_' . $field;
                                        $val1 = $modelClass::$func($val, 1); //NewsCat::_parent()
                                        echo "<td class='field_$field checkbox'> $val1 </td>";
                                    }
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
                                echo ("\n<td class='action'> <a href='$adminUrl/edit?id=$id'> <i class='fa fa-edit'></i>   </a>  
     <a href='$adminUrl/delete?id=$id'>  <i class='fa fa-trash'></i>  </a> </td>");
                                echo ("\n</tr>");
                            }
                        ?>


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>






    </div><!-- /.container-fluid -->
</section>


<?php
require_once "../templates/admin/footer.php"
?>