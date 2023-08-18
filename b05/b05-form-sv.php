<?php
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

//echo $_POST['ab123'];

echo "<pre>";
print_r($_POST);
echo "</pre>";

$nSv = $_POST['so_sv'] ?? 0;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$mDiemTb = [];
for($i = 1; $i <= $nSv; $i++){

    $diemLy = $_POST['diemLy_' . $i] ?? 0;
    $diemHoa = $_POST['diemHoa_' . $i] ?? 0;
    $diemToan = $_POST['diemToan_' . $i] ?? 0;
    
    if($diemHoa < 0 || $diemHoa > 10){
        die("Diem khong valid");
    }

    $st1 = new SinhVien();
    $st1->set_


    $diemLy = test_input($diemLy);
    $diemHoa = test_input($diemHoa);
    $diemToan = test_input($diemToan);

    // echo "<br> I = $i /" . $_POST['diemLy_' . $i];
    @$mDiemTb[$i] = 
        (
        ($diemToan) + 
        ($diemLy) + 
        ($diemHoa)) / 3;
}

echo "<pre>";
print_r($mDiemTb);
echo "</pre>";

?>
<style>
    input {
        width: 100%;
    }
</style>

<h1>Form Nhập Thông Tin Sinh Viên</h1>


<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">


<input value="<?php echo $nSv?>" placeholder="So sinh vien" type="number" name='so_sv'>

    <table border='1'>
        <tr>
            <th>Tên</th>
            <th>Điểm Toán</th>
            <th>Điểm Lý</th>
            <th>Điểm Hóa</th>
            <th>Điểm Trung Bình</th>
        </tr>
        <?php
        //Nhan 3 hang, 3 sinh vien
        for($i = 1; $i <=$nSv; $i++)
//        $i = 0;
        {
        ?>
            <tr>
                <td><input placeholder="Nhap Ten" type="text" name="ten_<?php echo $i?>" 
                value="<?php echo $_POST["ten_".$i] ?? '' ?>">

                <?php if(isset($_POST) && !($_POST["ten_".$i] ?? '')) echo " Hay nhap ten"  ?>

                </td>

                <td><input placeholder="Nhap Toan" type="number" name="diemToan_<?php echo $i?>"
                value="<?php echo $_POST["diemToan_".$i] ?? '' ?>"
                ></td>

                <td><input placeholder="Nhap Ly" type="number" name="diemLy_<?php echo $i?>" 
                value="<?php echo $_POST["diemLy_".$i] ?? '' ?>" 
                ></td>

                <td><input type="number" name="diemHoa_<?php echo $i?>" 
                value="<?php echo $_POST["diemHoa_".$i] ?? '' ?>" 
                ></td>

                <td><?php echo $mDiemTb[$i] ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <input type="submit" value="Xem Điểm Trung Bình">
</form>
