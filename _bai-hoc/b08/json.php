<?php

ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  

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

echo '<pre>';
print_r($sv1);
echo '</pre>';

$str = json_encode($sv1);
echo "<br>" . json_encode($sv1);

$obj1 = json_decode($str);

echo '<pre>';
print_r($obj1);
echo '</pre>';

echo "<br>Ten = " . $obj1->ten;
