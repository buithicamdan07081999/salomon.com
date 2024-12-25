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
    <li><a href="frontend/index_layout.php">FRONT END PHP LAYOUT</a></li>
    <li><a href="kdbd.com/index.php">FRONT END PHP EDIT</a></li>
    <li><a href="frontend/freshshop/index.html">FRONT END FRESH SHOP</a></li>
    <li><a href="frontend/shop/index.html">FRONT END SHOP</a></li>
    </ol>  
</body>
</html>