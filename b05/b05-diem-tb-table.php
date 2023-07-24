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
$sv1 = new SinhVien("Nguyen Van A", 8.5, 7.2, 9.0);
$sv2 = new SinhVien("Tran Thi B", 7.8, 6.5, 8.3);
$sv3 = new SinhVien("Le Van C", 9.0, 8.0, 7.5);
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
            <th>Điểm Hóa</th>
            <th>Điểm Trung Bình</th>
        </tr>
        <tr>
            <td><?php echo $sv1->ten; ?></td>
            <td><?php echo $sv1->diemToan; ?></td>
            <td><?php echo $sv1->diemLy; ?></td>
            <td><?php echo $sv1->diemHoa; ?></td>
            <td><?php echo $sv1->diemTrungBinh; ?></td>
        </tr>
        <tr>
            <td><?php echo $sv2->ten; ?></td>
            <td><?php echo $sv2->diemToan; ?></td>
            <td><?php echo $sv2->diemLy; ?></td>
            <td><?php echo $sv2->diemHoa; ?></td>
            <td><?php echo $sv2->diemTrungBinh; ?></td>
        </tr>
        <tr>
            <td><?php echo $sv3->ten; ?></td>
            <td><?php echo $sv3->diemToan; ?></td>
            <td><?php echo $sv3->diemLy; ?></td>
            <td><?php echo $sv3->diemHoa; ?></td>
            <td><?php echo $sv3->diemTrungBinh; ?></td>
        </tr>
    </table>
</body>
</html>