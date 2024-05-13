<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Thêm mới Hình thức thanh toán</h1>
    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Tên hình thức thanh toán: <input type="text" name="httt_ten" /><br />
        Mô tả hình thức thanh toán: <input type="text" name="httt_mota" /><br />

        <a href="../index.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $httt_ma = $_POST['httt_ma'];
        $httt_ten = $_POST['httt_ten'];

        $sql = "INSERT INTO hinhthucthanhtoan(httt_ma, httt_ten)
                VALUES ('$httt_ma', '$httt_ten');";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
        echo '<script> location.href="index.php"</script>';
    }
    ?>
</body>

</html>