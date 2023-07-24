<h1>Form Nhập Thông Tin Sinh Viên</h1>
<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
    <table border='1'>
        <tr>
            <th>Tên</th>
            <th>Điểm Toán</th>
            <th>Điểm Lý</th>
            <th>Điểm Hóa</th>
            <th>Điểm Trung Bình</th>
        </tr>
        <!-- Sinh viên 1 -->
        <tr>
            <td><input type="text" name="ten_1" ></td>
            <td><input type="number" name="diemToan_1" ></td>
            <td><input type="number" name="diemLy_1" ></td>
            <td><input type="number" name="diemHoa_1" ></td>
            <td><!-- Điểm trung bình sẽ tính bằng mã PHP, ở đây để trống --></td>
        </tr>
        <!-- Sinh viên 2 -->
        <tr>
            <td><input type="text" name="ten_2" ></td>
            <td><input type="number" name="diemToan_2" ></td>
            <td><input type="number" name="diemLy_2" ></td>
            <td><input type="number" name="diemHoa_2" ></td>
            <td><!-- Điểm trung bình sẽ tính bằng mã PHP, ở đây để trống --></td>
        </tr>
        <!-- Sinh viên 3 -->
        <tr>
            <td><input type="text" name="ten_3" ></td>
            <td><input type="number" name="diemToan_3" ></td>
            <td><input type="number" name="diemLy_3" ></td>
            <td><input type="number" name="diemHoa_3" ></td>
            <td><!-- Điểm trung bình sẽ tính bằng mã PHP, ở đây để trống --></td>
        </tr>
    </table>
    <input type="submit" value="Xem Điểm Trung Bình">
</form>
