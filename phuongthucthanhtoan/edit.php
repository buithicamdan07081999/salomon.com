<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sửa hình thức thanh toán</h1>
    <?php
    include_once __DIR__ . '/../dbconnect.php';
    $httt_ma = $_GET['httt_ma'];
    $sql_select_data_old = "select * from hinhthucthanhtoan where httt_ma = $httt_ma";
    $sql_data_old = mysqli_query($conn, $sql_select_data_old);
    $data_array = [];
    $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
    ?>

    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Mã hình thức thanh toán: <input type="text" name="httt_ma" value="<?= $data_array['httt_ma'] ?>" /><br />
        Tên hình thức thanh toán: <input type="text" name="httt_ten" value="<?= $data_array['httt_ten'] ?>" /><br />

        <a href="../create.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $httt_ma = $_GET['httt_ma'];
        $httt_ma = $_POST['httt_ma'];
        $httt_ten = $_POST['httt_ten'];

        $sql = "UPDATE hinhthucthanhtoan SET httt_ma = '$httt_ma', httt_ten = '$httt_ten' WHERE httt_ma = $httt_ma;";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
        echo '<script> location.href="index.php"</script>';

    }
    ?>
</body>

</html>