<?php
if ($GLOBALS['pageTitle'] ?? '')
    $GLOBALS['pageTitle'] = "Edit "  . $GLOBALS['pageTitle'];


require_once "../templates/admin/header.php";

if (isset($modelClass) && $modelClass instanceof BaseModel);

// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>



<section class="content pt-3">
    <div class="container-fluid">

        <?php

        if (isset($msg))
            echo "<p class='text-center text-primary'> $msg </p> ";

        if (isset($error) && $error) {
            echo "<pre>";
            print_r($error);
            echo "</pre>";
        }

        ?>


        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <b>
                        Edit <?php echo $modelClass::$nameView ?>
                    </b>
                </h3>
            </div>


            <form action="" id='myForm' method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php

                    foreach ($modelClass::$fillable as $field) {

                        $des = $modelClass::$metaFieldName[$field] ?? $field;
                        $val = $ret[$field];

                        $type = $modelClass::$metaFieldType[$field] ?? '';

                        echo ('<div class="form-group">');
                        echo ('<label for="">' . $des . '</label>');
                        if ($type == 'textarea' || $type == 'richtext') {
                            echo ("\n <textarea id='field_$field' class='form-control' name='$field'>$val</textarea> <p></p>");
                        } elseif ($type == 'image') {
                            if ($val)
                                echo ("\n <br> <img class='thumb' src='$val'>");
                            echo "<br> <input class='form-control' type='file' name='$field'> <p></p> ";
                        } elseif ($type == 'multi_image') {
                            if ($val){
                                echo ("\n <br> ");
                                $mImg = explode("\n", $val);
                                if($mImg)
                                foreach($mImg AS $img)
                                    echo (" <img class='thumb' src='$img'>");
                            }
                            echo "<br> <input multiple  class='form-control' type='file' name='$field"."[]"."'> <p></p> ";
                        } elseif ($type == 'checkbox') {
                            $check = '';
                            if ($val)
                                $check = 'checked';
                            echo " <input $check type='checkbox' class='checkBoxInput'> <input value='0'  type='hidden' name='$field'><p></p>";
                        }
                        elseif ($type == 'selectbox') {
                            echo "<select class='form-control' name='$field'>
                            <option value='0'> -- Chọn ---</option>";

                            $func = "_$field"; //_parent vì field = parent
                            echo $modelClass::$func($val);
                            
                            echo "</select>";
                            echo "<p></p>";
                        
                        } else{
                            echo ("\n <input class='form-control' type='text' name='$field' value='$val'> <p></p> ");
                           
                        }

                        echo ('</div');
                    }
                    ?>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ghi lại</button>
                </div>
            </form>
        </div>

        <?php

        ?>

    </div>
</section>

<?php
require_once "../templates/admin/footer.php"
?>

<?php
foreach ($modelClass::$fillable as $field) {
    $type = $modelClass::$metaFieldType[$field] ?? '';
    if ($type == 'richtext') {
?>
        <script>
            $(function() {
                // Summernote
                $('#field_<?php echo $field ?>').summernote()
                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })
        </script>

<?php
    }
}
?>

<script>

    document.querySelectorAll('#myForm input.checkBoxInput').forEach(function(elm) {
        elm.addEventListener('click', function() {
            console.log("Click ...");
            if(this.checked){
                console.log("checked ...");
                this.nextElementSibling.value = 1;
            }
            else{
                this.nextElementSibling.value = 0;
                console.log("not checked ...");
            }
        })
    })

</script>