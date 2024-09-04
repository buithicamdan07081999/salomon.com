<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách Khách hàng</h1>
    <?php
    // 1. Mở kết nối
    include_once __DIR__ . '/dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT kh_tendangnhap, 
                kh_ten, kh_diachi
            FROM khachhang;";

    // 3. Thực thi câu lệnh
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách thành mảng
    $arrDanhSachKH = [];
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC) ) {
        $arrDanhSachKH[] = array(
            'kh_tendangnhap' => $row['kh_tendangnhap'],
            'kh_ten' => $row['kh_ten'],
            'kh_diachi' => $row['kh_diachi'],
        );
    }
    ?>
    <ul>
        <?php foreach($arrDanhSachKH as $kh): ?>
        <li>Tên đăng nhập: <?= $kh['kh_tendangnhap'] ?> - 
            Họ tên: <?= $kh['kh_ten'] ?> - 
            Địa chỉ: <?= $kh['kh_diachi'] ?>
        </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>