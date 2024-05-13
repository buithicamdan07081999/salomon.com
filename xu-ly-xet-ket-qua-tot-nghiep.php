<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .level-1 { color: black; }
        .level-2 { color: blue; }
        .level-3 { color: green; }
        .khungketqua { border: 2px dashed red; padding: 10px;}
    </style>
</head>
<body>
    <h1>Kết quả xét tốt nghiệp</h1>
    <?php
        // 1. Bóc tách dữ liệu -> thu thập dữ liệu người dùng
        $hoten = $_POST['txtHoTen'];
        $dtb = $_POST['nDiemTB'];
        
        // Nếu biến $_POST['txtGioiTinh'] có giá trị => lấy giá trị người dùng chọn
        // Nếu không                                 => lấy giá trị mặc định
        $gioitinh = isset( $_POST['txtGioiTinh'] ) ? $_POST['txtGioiTinh'] : '1';
        

        // 3. Tính toán xét kết quả
        $ketqua;
        if($dtb >= 0 && $dtb <= 3) {
            $ketqua = 'Kết quả bạn là: <span class="level-1">Rớt</span>';
        } else if($dtb > 3 && $dtb <= 5) {
            $ketqua = 'Kết quả bạn là: Trung bình';
        } else if($dtb > 5 && $dtb <= 7) {
            $ketqua = 'Kết quả bạn là: Khá';
        } else if($dtb > 7 && $dtb <= 9) {
            $ketqua = 'Kết quả bạn là: Giỏi';
        } else if($dtb > 9 && $dtb <= 10) {
            $ketqua = 'Kết quả bạn là: Xuất sắc';
        } else {
            $ketqua = 'Điểm không hợp lệ, vui lòng kiểm tra lại...';
        }
    ?>
    <ul>
        <li>Họ tên: <?php echo $hoten ?></li>
        <li>Giới tính: 
            <?php 
                if($gioitinh == '1') {
                    echo 'Nam';
                } else {
                    echo 'Nữ';
                }
            ?>
        </li>
        <li>Điểm TB: <?= $dtb ?></li>
    </ul>
    <div class="khungketqua">
        <?= $ketqua ?>
    </div>
</body>
</html>

