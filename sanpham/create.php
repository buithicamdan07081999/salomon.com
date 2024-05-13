<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Thêm mới sản phảm</h1>
    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Tên sản phảm: <input type="text" name="sp_ten" /><br />
        Mô tả sản phảm: <input type="text" name="sp_mota" /><br />

        <a href="../index.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $sp_ten = $_POST['sp_ten'];
        $sp_mota = $_POST['sp_mota'];

        $sql = "INSERT INTO sanpham(sp_ten, sp_mota)
                VALUES ('$sp_ten', '$sp_mota');";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
        echo '<script> location.href="index.php"</script>';
    }
    ?>
</body>

</html>