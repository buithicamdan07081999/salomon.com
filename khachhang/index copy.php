<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
</head>
<body>
    <h1>Danh sách khách hàng</h1><br/><a href="../index.php">Trang chủ</a>
    <?php
    // Mở kết nối
    include_once __DIR__ . '/../dbconnect.php';
    // Chuẩn bị câu lệnh
    $sql = "SELECT * FROM nhasanxuat";
    // Thực thi
    $data = mysqli_query($conn, $sql);
    // Phân tích mảng
    $arrDanhsachKH = [];
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC))
    {
        $arrDanhsachKH[] = array(
            'kh_tendangnhap' => $row['kh_tendangnhap'], 
            'kh_ten' => $row['kh_ten'],
            'kh_diachi' => $row['kh_diachi'], 
            'kh_dienthoai' => $row['kh_dienthoai'],
            'kh_email' => $row['kh_email']);
    var_dump($arrDanhsachKH);

    }
    ?>
 <ul>
        <?php foreach($arrDanhSachKH as $kh): ?>
        <li>Tên đăng nhập: <?= $kh['kh_tendangnhap'] ?> - 
            Họ tên: <?= $kh['kh_ten'] ?> - 
            Địa chỉ: <?= $kh['kh_diachi'] ?>
            Số điện thoại: <?= $kh['kh_dienthoai'] ?>
            Email: <?= $kh['kh_email'] ?>
        </li>
        <?php endforeach; ?>
    </ul>
    </body> 
</html> -->