<?php
class SinhVien {
    
    public $ten;
    public $diemToan;
    public $diemLy;
    public $diemHoa;

    public $diemTrungBinh;

    // Constructor
    public function __construct($ten, $diemToan, $diemLy, $diemHoa) {
        $this->ten = $ten;
        $this->diemToan = $diemToan;
        $this->diemLy = $diemLy;
        $this->diemHoa = $diemHoa;
        $this->tinhDiemTrungBinh();
    }

    // Tính điểm trung bình
    public function tinhDiemTrungBinh() {
        $this->diemTrungBinh = number_format(($this->diemToan + $this->diemLy + $this->diemHoa) / 3, 2);
    }
}

// Tạo các đối tượng sinh viên
$sv1 = new SinhVien("Nguyen Van An", 8.5, 7.2, 9.0);
$sv2 = new SinhVien("Tran Thi Binh", 7.8, 6.5, 8.3);
$sv3 = new SinhVien("Le Van Nam", 9.0, 8.0, 7.5);
$sv4 = new SinhVien("Nguyen Van An", 8, 9, 9.0);

$mSv = [$sv1, $sv2, $sv3, $sv4];

$searchName = $_GET['search'];
if($searchName){
    echo "<br> search:". $searchName;
    $mSvFound = [];
    foreach($mSv AS $sv){
        if($sv->ten == $searchName){
            echo "<br> Found: ". $searchName;
            $mSvFound[] = $sv;
        }
    }
}
$mSv = $mSvFound;


$sort_hoa = $_GET['sort_hoa'];
$sort_tb = $_GET['sort_tb'];

if($sort_hoa){
    //Sap xep theo Diem Hoa o day
}

if($sort_tb){
    //Sap xep theo Diem Trung binh o day
    // usort($mSv, function ($a, $b){
    //     return $a->diemTrungBinh > $b->diemTrungBinh;
    // });
    //Neu khong dung usort, thi dung vong lap for de sap xep:
    for($i = 0; $i < count($mSv); $i++){
        for($j = $i + 1; $j < count($mSv); $j++){
            if($mSv[$i]->diemTrungBinh < $mSv[$j]->diemTrungBinh){
                $tmp = $mSv[$i];
                $mSv[$i] = $mSv[$j];
                $mSv[$j] = $tmp;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bảng điểm sinh viên</title>
    <style>

    </style>
</head>



<body>
    <h1>Bảng điểm sinh viên</h1>
    <table border="1">
        <tr>
            <th>Tên</th>
            <th>Điểm Toán</th>
            <th>Điểm Lý</th>
            <th> <a href="<?php echo $_SERVER['PHP_SELF']; $x = 111 ?>?sort_hoa=1">Điểm Hóa</a></th>
            <th> <a href="/b05/b05-diem-tb-table.php?sort_tb=1">Điểm Trung Bình</a> </th>
        </tr>

        <?php 
        
        foreach($mSv AS $sv){
        ?>
        <tr>
            <td class="abc"><?php echo $sv->ten; ?></td>
            <!-- <?php echo "<td class='abc'> $sv->ten </td>"; ?> -->
            <td><?php echo $sv->diemToan; ?></td>
            <td><?php echo $sv->diemLy; ?></td>
            <td><?php echo $sv->diemHoa; ?></td>
            <td><?php echo $sv->diemTrungBinh; ?></td>
        </tr>
        <?php
        }
        ?>
        
    </table>
</body>
</html>