<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang chủ</h1>
    <?php
    // Nhúng đoạn code bên trong file '' vào 
    // trong file đang viết code
    include_once __DIR__ . '/ham-tien-ich.php';

    // Sử dụng hàm
    chao_mung('Đan');
    ?>


    <h2>Tùy chọn</h2>
    <ol>
    <li><a href="loaisanpham/index.php">CRUD-DANHMUC</a></li>
    <li><a href="nhasanxuat/index.php">CRUD-NHASANXUAT</a></li>
    <li><a href="phuongthucthanhtoan/index.php">CRUD-PHUONGTHUCTHANHTOAN</a></li>
    <li><a href="nhasanxuat/index.php">CRUD-NHASANXUAT</a></li>
    <li><a href="sanpham/index.php">CRUD-SANPHAM</a></li>
    </ol>  
</body>
</html>