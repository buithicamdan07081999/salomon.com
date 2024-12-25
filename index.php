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
    include_once __DIR__ . '/backend/function/old/ham-tien-ich.php';
    // Sử dụng hàm
    chao_mung('Bùi Đan');
    ?>
    <h2>Tùy chọn</h2>
    <ol>
    <li><a href="backend/index.php">CRUD-ADMIN</a></li>
    <li><a href="frontend/index.php">Front End  PHP</a></li>
    <li><a href="frontend/freshshop/index.html">CRUD-ADMIN</a></li>
    <li><a href="frontend/store/index.html">CRUD-ADMIN</a></li>
    </ol>  
</body>
</html>