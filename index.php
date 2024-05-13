<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang chủ</h1>
    <p>giao diện đẹp...</p>
    <?php
    // Nhúng đoạn code bên trong file '' vào 
    // trong file đang viết code
    include_once __DIR__ . '/ham-tien-ich.php';

    // Sử dụng hàm
    chao_mung('Cường');
    ?>
    <a href="loaisanpham/index.php">CRUD-DANHMUC</a>
</body>
</html>