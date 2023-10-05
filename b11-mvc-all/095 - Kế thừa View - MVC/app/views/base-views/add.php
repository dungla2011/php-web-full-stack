
<?php
require_once "../templates/admin/header.php"
?>

Thêm <?php echo $modelClass::$nameView ?>:

<?php 
if(isset($msg))
    echo "<p> $msg </p> ";
if(isset($error)){
    echo "<pre>";
    print_r($error);
    echo "</pre>";
}

?>

<p></p>
<form action="" method="post">

<table border="1" >
    <?php

    foreach($modelClass::$fillable AS $field){
        echo("\n<tr>");
        $val = $ret[$field] ?? '';
        echo("<td>" . $modelClass::$metaFieldName[$field]) . "</td>";
        echo("<td>");
        if(($modelClass::$metaFieldType[$field] ?? '') == 'password'){
            echo("\n<input type='password' name='$field' >");
        }
        elseif(($modelClass::$metaFieldType[$field] ?? '') == 'textarea'){
            echo("\n<textarea name='$field'></textarea>");
        }
        else
            echo("\n<input type='name'name='$field'>");       
        }
        echo("</td>");
        echo("\n<tr>");
    ?>

</table>
    <!-- Tên Tin: <input type="text" name='name' >
    <p></p>
    Mô tả: <input type="text" name='description' >
    <p></p>
    Nội dung: <input type="text" name='content' >
    <p></p> -->
    <input type="submit">

</form>


<?php 



?>

<?php
require_once "../templates/admin/footer.php"
?>

