<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách Khách hàng</h1>
    <a href="../index.php">Trang chủ</a>
    <?php
    // 1. Mở kết nối
    include_once __DIR__ . '/../dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT kh_tendangnhap, 
                kh_ten, kh_diachi, kh_dienthoai, kh_email
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
            'kh_dienthoai' => $row['kh_dienthoai'],
            'kh_email' => $row['kh_email'],
        );
    }

    ?>
<table border="1">
<tr>
    <th>STT</th>
    <th>Tên đăng nhập</th>
    <th>Họ tên</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Email</th>
</tr>
<?php $stt=1 ?>
        <?php foreach ($arrDanhSachKH as $kh) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $kh['kh_tendangnhap'] ?></td>
                <td><?= $kh['kh_ten'] ?></td>
                <td><?= $kh['kh_diachi'] ?></td>
                <td><?= $kh['kh_dienthoai'] ?></td>
                <td><?= $kh['kh_email'] ?></td>
                <!-- <td>
                    <a href="edit.php?kh_ma=<?= $kh['kh_ma'] ?>">Modify</a>
                    <a href="delete.php?kh_ma=<?= $kh['kh_ma'] ?>">Delete</a>
                </td>                 -->
            </tr>
        <?php 
        $stt++;
        endforeach; 
        ?>
</table>
</body>
</html>