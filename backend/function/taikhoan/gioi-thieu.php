<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Giới thiệu</h1>
    <p>giới thiệu....</p>
    <?php
    // Nhúng đoạn code bên trong file '' vào 
    // trong file đang viết code
    include_once __DIR__ . '/ham-tien-ich.php';

    // Sử dụng hàm
    chao_mung('LAN');
    $tb = trung_binh_cong(66, 88);
    echo $tb;
    // sử dụng hàm
    ngay_hien_tai();
    ngay_gio_hien_tai();
    ?>
</body>
</html>