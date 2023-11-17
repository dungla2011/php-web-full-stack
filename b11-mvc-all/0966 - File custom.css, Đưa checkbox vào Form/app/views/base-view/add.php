
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

            <form action="" id='myForm' method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php

                    foreach ($modelClass::$fillable as $field) {

                        $des = $modelClass::$metaFieldName[$field] ?? $field;
                        $val = '';

                        $type = $modelClass::$metaFieldType[$field] ?? '';

                        echo('<div class="form-group">');
                        echo('<label for="">'.$des.'</label>');
                        if ($type == 'textarea' || $type == 'richtext') {
                            echo ("\n <textarea id='field_$field' class='form-control' name='$field'>$val</textarea> <p></p>");
                        } elseif ($type == 'image') {
                            if ($val)
                                echo ("\n <br> <img class='thumb' src='$val'>");
                            echo "<br> <input class='form-control' type='file' name='$field'> <p></p> ";
                        } elseif ($type == 'checkbox') {

                            $check = '';
                            if($val)
                                $check = 'checked';

                        echo " <input $check id='myCheckbox_$field' type='checkbox'> <input id='myCheckboxHidden_$field' value='0'  type='hidden' name='$field'> <p></p> ";
                        }
                        else
                            echo ("\n <input class='form-control' type='text' name='$field' value='$val'> <p></p> ");
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


<script>

document.addEventListener('DOMContentLoaded', function() {
  // Bắt sự kiện khi form được submit
  document.getElementById('myForm').addEventListener('submit', function(event) {

    // alert("12345")
    // Kiểm tra xem checkbox có được chọn hay không
    var checkbox;
    var checkboxHidden;

    <?php
    foreach ($modelClass::$fillable as $field) {
        $type = $modelClass::$metaFieldType[$field] ?? '';

        if ($type == 'checkbox') {
    ?>
        checkbox = document.getElementById('myCheckbox_<?php echo $field ?>');
        checkboxHidden = document.getElementById('myCheckboxHidden_<?php echo $field ?>');
        if (checkbox.checked) {
            // Nếu được chọn, cập nhật giá trị của input hidden thành 1
            checkboxHidden.value = '1';
        }

    <?php
        }
    }
    ?>


    // Nếu không được chọn, giá trị mặc định (0) của input hidden vẫn được giữ nguyên

    // Tiếp tục submit form
    return true;
  });
});

</script>