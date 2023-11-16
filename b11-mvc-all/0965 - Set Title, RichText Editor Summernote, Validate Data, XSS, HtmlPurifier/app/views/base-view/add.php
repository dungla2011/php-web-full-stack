
<?php
if($GLOBALS['pageTitle'] ?? '')
    $GLOBALS['pageTitle'] = "Add "  . $GLOBALS['pageTitle'];


require_once "../templates/admin/header.php";
if(isset($modelClass) && $modelClass instanceof BaseModel);
?>


<section class="content pt-3">
    <div class="container-fluid">


<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

?>


<div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <b>
                    Add <?php echo $modelClass::$nameView ?>
                    </b>
                </h3>
            </div>


            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php

                    foreach ($modelClass::$fillable as $field) {

                        $des = $modelClass::$metaFieldName[$field] ?? $field;
                        
                        $type = $modelClass::$metaFieldType[$field] ?? '';

                        echo('<div class="form-group">');
                        echo('<label for="">'.$des.'</label>');
                        if ($type == 'textarea') {
                            echo ("\n <textarea class='form-control' name='$field'></textarea> <p></p>");
                        } elseif ($type == 'image') {
                             echo "<br> <input class='form-control' type='file' name='$field'> <p></p> ";
                        } else
                            echo ("\n <input class='form-control' type='text' name='$field' > <p></p> ");
                        echo('</div');
                    }


                    ?>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ghi lại</button>
                </div>
            </form>
        </div>


    </div>
</section>


<?php
require_once "../templates/admin/footer.php"
?>

