
<?php
require_once "../templates/admin/header.php";


// echo "<pre>";
// print_r( $ret);
// echo "</pre>";
?>

<b>
Edit <?php echo $modelClass::$nameView ?>:
</b>

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
            echo("\n<input type='password' name='$field' value='$val'>");
        }
        elseif(($modelClass::$metaFieldType[$field] ?? '') == 'textarea'){
            echo("\n<textarea name='$field'>$val</textarea>");
        }
        else
            echo("\n<input type='name' value='$val' name='$field'>");       
    }
    
    echo("</td>");
    echo("\n<tr>");
    
    ?>

    </table>
    <!-- Tên Tin: <input type="text" name='name' value='<?php echo $ret['name'] ?>'>
    <p></p>
    Mô tả: <input type="text" name='description' value='<?php echo $ret['description'] ?>'>
    <p></p>
    Chi tiết: <input type="text" name='content' value='<?php echo $ret['content'] ?>'>
    <p></p>
     -->
     <p></p>
    <input type="submit" value="Ghi lại">

</form>

<?php
require_once "../templates/admin/footer.php"
?>

