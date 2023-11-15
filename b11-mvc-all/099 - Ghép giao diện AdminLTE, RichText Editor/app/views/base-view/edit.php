<?php


require_once "../templates/admin/header.php";

if (isset($modelClass) && $modelClass instanceof BaseModel);

// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>



<?php
if (isset($msg) && $msg)
    echo "<div class='text-center text-primary pt-3'> $msg </div> ";
if (isset($error) && $error) {
    echo "<pre>";
    print_r($error);
    echo "</pre>";   
}
?>


<div class='container-fluid  p-3'>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">
                <b>
                 Edit <?php echo $modelClass::$nameView ?>: 
                 </b>
            </h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <?php
                foreach ($modelClass::$fillable as $field) {
                    
                    $des = $modelClass::$metaFieldName[$field] ?? $field;
                    $val = $ret[$field];
                    $type = $modelClass::$metaFieldType[$field] ?? '';

                    echo('<div class="form-group">');
                    echo('<label for="">'.$des.'</label>');
                    if ($type == 'textarea' || $type == 'richtext') {
                        echo ("\n<textarea class='form-control' id='rich_text_$field' name='$field'>$val</textarea> <p></p>");
                    } elseif ($type == 'image') {
                        if ($val)
                            echo ("\n <br> <img class='thumb' src='$val'>");
                        echo "<br> <input class='form-control' type='file' name='$field'> <p></p> ";
                    } else
                        echo ("\n <input class='form-control' type='text' name='$field' value='$val'> <p></p> ");
                    
                    echo "</div>";
                }
                ?>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ghi lại</button>
                </div>
            </div>
        </form>
</div>


<?php

?>

<?php
require_once "../templates/admin/footer.php"
?>

<?php 

foreach ($modelClass::$fillable as $field) {
    
    $type = $modelClass::$metaFieldType[$field] ?? '';
    if($type == 'richtext'){
?>
<script>
  $(function () {
    // Summernote
    $('#<?php echo 'rich_text_'.$field ?>').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 300
      })
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